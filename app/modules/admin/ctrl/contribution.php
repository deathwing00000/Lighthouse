<?php
use lighthouse\Auth;
use lighthouse\Community;
use lighthouse\Contribution;
use lighthouse\Log;
use Core\Utils;
use lighthouse\Form;
class controller extends Ctrl {
    function init() {
        $is_admin = false;
        $sel_wallet_adr = null;
        $community = Community::getByDomain(app_site);
        $site = Auth::getSite();

        if(isset($_SESSION['lh_sel_wallet_adr'])) {
            $sel_wallet_adr = $_SESSION['lh_sel_wallet_adr'];
            $is_admin = $community->isAdmin($sel_wallet_adr);
        }
        else
        {
            header("Location: " . app_url.'admin');
            die();
        }

        if($site === false) {
            header("Location: " . app_url.'admin');
            die();
        }

        if($this->__lh_request->is_xmlHttpRequest) {

            if($this->__lh_request->is_post) {

                try {
                    $form_id = $wallet_to = $contribution_reason = $tags = null;
                    $post = $_POST;
                    unset($post['form_id']);
                    unset($post['contribution_reason']);
                    unset($post['wallet_address']);
                    unset($post['tags']);

                    if ($this->hasParam('form_id') && strlen($this->getParam('form_id')) > 0)
                        $form_id = $this->getParam('form_id');
                    else
                        throw new Exception("Invalid form details, please contact your admin");

                    if ($this->hasParam('wallet_address') && strlen($this->getParam('wallet_address')) > 0)
                        $wallet_to = $this->getParam('wallet_address');
                    else
                        throw new Exception("wallet_address:This field is required.");

                    if ($this->hasParam('contribution_reason') && strlen($this->getParam('contribution_reason')) > 0)
                        $contribution_reason = $this->getParam('contribution_reason');
                    else
                        throw new Exception("contribution_reason:This field is required.");

                    if ($this->hasParam('tags') && count($this->getParam('tags')) > 0) {
                        $tags = $this->getParam('tags');
                        $tags = is_array($tags) ? implode(',', $tags) : '';
                    }

                    $form = Form::get($form_id);
                    $elements = $form->getElements();

                    foreach ($elements as $element) {
                        if ($element['e_required'] == 1) {
                            $ele_name = $element['e_name'];
                            if (!isset($post[$ele_name]) || strlen($post[$ele_name]) < 1)
                                throw new Exception($ele_name . ":This field is required.");
                        }
                    }

                    $contribusion = new Contribution();
                    $contribusion->comunity_id = $community->id;
                    $contribusion->wallet_from = $sel_wallet_adr;
                    $contribusion->contribution_reason = $contribution_reason;
                    $contribusion->wallet_to = $wallet_to;
                    $contribusion->tags = $tags;
                    $contribusion->form_id = $form_id;
                    $contribusion->form_data = json_encode($post);
                    $contribusion->insert();

                    echo json_encode(array('success' => true, 'message' => 'Success! Your claim has been submitted.'));

                } catch (Exception $e) {
                    $msg = explode(':', $e->getMessage());
                    $element = 'error-msg';
                    if (isset($msg[1])) {
                        $element = $msg[0];
                        $msg = $msg[1];
                    }
                    echo json_encode(array('success' => false, 'msg' => $msg, 'element' => $element));
                }
                exit();
            }
            else {
                if(__ROUTER_PATH == '/contribution-list' ) {
                    $html = '';
                    if($this->hasParam('t')) {
                        $t = $this->getParam('t');
                        $domain = $community->dao_domain;
                        $status = 'c.status = 0';
                        if($t == 'Denied')
                            $status = 'c.status = 2';
                        elseif ($t == 'Approved')
                            $status = 'c.status = 1';
                        elseif ($t = 'Reviewed')
                            $status = 'c.status = 1 AND c.status = 2';

                        $claims = Contribution::find("SELECT c.id as c_id,c.c_at,c.status,f.form_title,c.contribution_reason,c.tags,c.form_data FROM contributions c LEFT JOIN communities com ON c.comunity_id=com.id LEFT JOIN forms f ON c.form_id=f.id WHERE $status AND f.id <> 2 AND com.dao_domain='$domain'");
                        include __DIR__ . '/../tpl/partial/contribution_list.php';
                        $html = ob_get_clean();
                    }

                    echo json_encode(array('success' => true,'html'=>$html));
                    exit();
                }
                else {
                    $html = $sql = '';
                    $com_id = $community->id;

                    if ($this->hasParam('c') && intval($this->getParam('c')) > 0)
                        $sql .= ' AND complexity=' . $this->getParam('c');

                    if ($this->hasParam('i') && intval($this->getParam('i')) > 0)
                        $sql .= ' AND importance=' . $this->getParam('i');

                    if ($this->hasParam('q') && intval($this->getParam('q')) > 0)
                        $sql .= ' AND quality=' . $this->getParam('q');

                    $contributions = Contribution::find("SELECT c.contribution_reason,c.c_at FROM contributions c LEFT JOIN approvals a ON c.id=a.contribution_id where comunity_id='$com_id' " . $sql);
                    if ($contributions != false && $contributions->num_rows > 0) {
                        while ($row = $contributions->fetch_array(MYSQLI_ASSOC)) {
                            $html .= '<div class="p-8 bg-lighter rounded-1 mb-6">
                        <div class="text-muted fs-sm">' . Utils::time_elapsed_string($row['c_at'], false, true) . '</div>
                        <div class="fw-medium mt-1">' . $row['contribution_reason'] . '</div></div>';
                        }
                    } else {
                        $html = '<div class="d-flex flex-column align-items-center justify-content-center py-25">
                        <img src="' . app_cdn_path . 'img/img-empty.svg" width="208">
                        <div class="fw-medium mt-4">No data found.</div></div>';
                    }

                    echo json_encode(array('success' => true, 'html' => $html));
                    exit();
                }
            }
        }
        else {

            $form = null;
            $template = '/../tpl/section.contribution.php';

            if($this->hasParam('form') && strlen($this->getParam('form')) > 0) {
                $form_id = $this->getParam('form');
                $form = Form::get($form_id);
                $template = '/../tpl/section.form_template.php';
            }

            $__page = (object)array(
                'title' => $site['site_name'],
                'form' => $form,
                'site' => $site,
                'is_admin' => $is_admin,
                'blockchain' => $site['blockchain'],
                'sel_wallet_adr' => $sel_wallet_adr,
                'sections' => array(
                    __DIR__ . $template
                ),
                'js' => array()
            );
            require_once app_template_path . '/admin-base.php';
            exit();
        }
    }
}
?>