<?php
use lighthouse\Auth;
use lighthouse\Contribution;
use lighthouse\Community;
use lighthouse\Approval;
use lighthouse\Log;
use lighthouse\Form;
class controller extends Ctrl {
    function init() {
        $is_admin = false;
        $sel_wallet_adr = null;
        $community = Community::getByDomain(app_site);

        if(isset($_SESSION['lh_sel_wallet_adr'])) {
            $sel_wallet_adr = $_SESSION['lh_sel_wallet_adr'];
            $is_admin = $community->isAdmin($sel_wallet_adr);
        }
        else
        {
            header("Location: " . app_url.'admin');
            die();
        }

        if($this->__lh_request->is_xmlHttpRequest) {

            if(__ROUTER_PATH == '/contribution-status' && $this->getParam('con_id')){
                $con_id = $this->getParam('con_id');
                $contribution = Contribution::get($con_id);

                if($this->hasParam('status')) {

                    if($this->getParam('status') == 2){

                        $contribution->refusal += 1;
                        $contribution->status = 2;
                        $contribution->update();

                        $log = new Log();
                        $log->type = 'Contribution';
                        $log->type_id = $contribution->id;
                        $log->action = 'rejected';
                        $log->c_by = $sel_wallet_adr;
                        $log->insert();

                        echo json_encode(array('success' => true));
                        exit();
                    }
                    else {
                        $approve = false;
                        $c = $this->hasParam('c') ? $this->getParam('c') : 0;
                        $i = $this->hasParam('i') ? $this->getParam('i') : 0;
                        $q = $this->hasParam('q') ? $this->getParam('q') : 0;

                        $approval = new Approval();
                        $approval->approval_by = $sel_wallet_adr;
                        $approval->contribution_id = $contribution->id;
                        $approval->subdomain = app_site;
                        $approval->complexity = $c;
                        $approval->importance = $i;
                        $approval->quality = $q;
                        $approval->insert();

                        $contribution->approvals += 1;
                        $points = $contribution->score;
                        $points += ($c + $i + $q);
                        $points = ($points/$contribution->approvals);
                        $contribution->score = $points;
                        if($contribution->approvals == $community->approval_count) {
                            $contribution->status = 1;
                            $approve = true;
                        }
                        $contribution->update();

                        $log = new Log();
                        $log->type = 'Contribution';
                        $log->type_id = $contribution->id;
                        $log->action = 'approved';
                        $log->c_by = $sel_wallet_adr;
                        $log->insert();

                        $contribution_id = $contribution->id;
                        $stewards = $community->getStewards();
                        $html = '';
                        foreach (Approval::getApprovals($contribution_id) as $stewd_adr) {
                            $steward = $stewards[$stewd_adr];
                            $html .= '<div class="fw-semibold">'.$steward["name"].'</div><div class="fw-medium fs-4 mt-1">'.$steward["wallet_adr"].'</div><a class="fw-medium mt-2 text-primary text-decoration-none" href="#">View Transaction</a>';
                        }

                        echo json_encode(array('success' => true, 'approve' => $approve ,'steward_html' => $html,'c_id' => $contribution->id,'message' => 'Success! Your contribution have been updated.'));
                        exit();
                    }

                }
                else
                    echo json_encode(array('success' => false,'message' => 'Error! Something went wrong.'));
                exit();
            }
            elseif (__ROUTER_PATH == '/contribution-details' && $this->getParam('con_id')) {
                $con_id        = $this->getParam('con_id');
                $contribution  = Contribution::get($con_id);
                $form          = Form::get($contribution->form_id);
                $elements      = $form->getElements();
                $wallet_to     = $contribution->wallet_to;
                $stewards      = $community->getStewards();
                $approvals     = Approval::getApprovals($contribution->id);
                $contributions = Contribution::find("SELECT contribution_reason,c_at FROM contributions where comunity_id='$con_id' AND wallet_to='$wallet_to' order by c_at");
                $user_arrovals = Approval::getUserApprovals($contribution->id);

                include __DIR__ . '/../tpl/partial/contribution_details.php';
                $html = ob_get_clean();
                echo json_encode(array('success' => true,'html'=>$html));
                exit();
            }
        }
        else {

            $site = Auth::getSite();
            if($site === false) {
                header("Location: https://lighthouse.xyz");
                die();
            }

            $domain = $site['sub_domain'];
            $all_claims = Contribution::find("SELECT c.id as c_id,c.c_at,c.status,f.form_title,c.contribution_reason,c.tags,c.form_data FROM contributions c LEFT JOIN communities com ON c.comunity_id=com.id LEFT JOIN forms f ON c.form_id=f.id WHERE f.id <> 2 AND com.dao_domain='$domain'");
            $claims = $a_claims = $r_claims = $d_claims= array();

            if($all_claims != false) {
                foreach ($all_claims as $claim) {
                    if ($claim['status'] == 0)
                        array_push($claims, $claim);
                    elseif ($claim['status'] == 1) {
                        array_push($a_claims, $claim);
                        array_push($r_claims, $claim);
                    } else {
                        array_push($d_claims, $claim);
                        array_push($r_claims, $claim);
                    }
                }
            }

            $__page = (object)array(
                'title' => $site['site_name'],
                'site' => $site,
                'blockchain' => $site['blockchain'],
                'sel_wallet_adr' => $sel_wallet_adr,
                'is_admin' => $is_admin,
                'claims' => $claims,
                'a_claims' => $a_claims,
                'all_claims' => $all_claims,
                'r_claims' => $r_claims,
                'd_claims' => $d_claims,
                'sections' => array(
                    __DIR__ . '/../tpl/section.admin-approvals.php'
                ),
                'js' => array()
            );
            require_once app_template_path . '/admin-base.php';
            exit();
        }
    }
}
?>