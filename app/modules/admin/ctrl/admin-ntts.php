<?php
use lighthouse\Auth;
use lighthouse\Community;
use lighthouse\Claim;
use lighthouse\Api;
use lighthouse\Log;
class controller extends Ctrl {
    function init() {

        $is_admin = false;
        $sel_wallet_adr = null;
        $community = Community::getByDomain(app_site);

        $login = Auth::attemptLogin();
        if($login != false) {
            $sel_wallet_adr = $login;
            $is_admin = $community->isAdmin($sel_wallet_adr);
        }
        else
        {
            header("Location: " . app_url.'admin');
            die();
        }

        $site = Auth::getSite();
        if($site === false) {
            header("Location: " . app_url.'admin');
            die();
        }

        if($this->__lh_request->is_xmlHttpRequest) {

            try {

                $wallet_address = $ntts = null;

                if($this->hasParam('wallet_address') && strlen($this->getParam('wallet_address')) > 0)
                    $wallet_address = $this->getParam('wallet_address');
                else
                    throw new Exception("sel_wallet_address:Please connect the wallet");

                if($this->hasParam('ntts'))
                    $ntts = floatval($this->getParam('ntts'));
                else
                    throw new Exception("ntts:Not a valid NTTs");

                if($community->blockchain == SOLANA)
                    $api_response = api::addSolanaPoints($community->contract_name,$wallet_address,$ntts);
                else
                    $api_response = api::addPoints(constant(strtoupper($community->blockchain).'_API'),app_site,$wallet_address,$ntts);

                if(isset($api_response->error)) {
                    echo json_encode(array('success' => false,'message' =>'Error! Your NTTs have not been sent. <a class="text-white ms-1" id="retryNewNtt" hre="#">RETRY</a>'));
                    exit();
                }
                else {

                    $reason = $this->hasParam('claim_reason') ? $this->getParam('claim_reason') : '';
                    $tags   = $this->hasParam('claim_tags') ? $this->getParam('claim_tags') : '';
                    $tags   = is_array($tags) ? implode(',', $tags) : '';

                    $claim  = new Claim();
                    $claim->wallet_adr = $wallet_address;
                    $claim->ntts = $ntts;
                    $claim->clm_reason = $reason;
                    $claim->clm_tags = $tags;
                    $claim->status = 1;
                    $claim->admin_adr = $sel_wallet_adr;
                    $claim->comunity_id = $community->id;

                    $claim->txHash = $api_response->txHash;
                    if($community->blockchain != SOLANA)
                        $claim->chainId = $api_response->chainId;

                    $id = $claim->insert();

                    $log = new Log();
                    $log->type = 'Claim';
                    $log->type_id = $id;
                    $log->action = 'created';
                    $log->c_by = $sel_wallet_adr;
                    $log->insert();

                    if($community->blockchain == SOLANA)
                        echo json_encode(array('success' => true, 'message' => 'Success! Your NTTs have been sent. <a class="text-white ms-1" target="_blank" href="'.constant(strtoupper($community->blockchain).'_TX_LINK').$claim->txHash.'?cluster=devnet"> VIEW TRANSACTION</a>'));
                    else
                        echo json_encode(array('success' => true, 'message' => 'Success! Your NTTs have been sent. <a class="text-white ms-1" target="_blank" href="'.constant(strtoupper($community->blockchain).'_TX_LINK').$claim->txHash.'"> VIEW TRANSACTION</a>'));
                }
            }
            catch (Exception $e)
            {
                $msg = explode(':',$e->getMessage());
                $element = 'error-msg';
                if(isset($msg[1])){
                    $element = $msg[0];
                    $msg = $msg[1];
                }
                echo json_encode(array('success' => false,'msg'=>$msg,'element'=>$element));
            }
            exit();
        }
        else {

            $solana = false;
            if($community->blockchain == 'solana')
                $solana = true;

            $__page = (object)array(
                'title' => $site['site_name'],
                'site' => $site,
                'ticker' => $community->ticker,
                'solana' => $solana,
                'blockchain' => $community->blockchain,
                'logo_url' => $community->getLogoImage(),
                'sel_wallet_adr' => $sel_wallet_adr,
                'user' => \lighthouse\User::isExistUser($sel_wallet_adr,$community->id),
                'sections' => array(
                    __DIR__ . '/../tpl/section.admin-ntts.php'
                ),
                'js' => array()
            );
            require_once app_template_path . '/admin-base.php';
            exit();
        }
    }
}
?>