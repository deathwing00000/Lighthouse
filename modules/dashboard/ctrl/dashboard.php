<?php
use Core\Ds;
use Core\Utils;
class controller extends Ctrl {
    function init() {

        if($this->__lh_request->is_xmlHttpRequest) {

            if($this->__lh_request->is_post){
                $comment    = $this->hasParam('comments')?$this->getParam('comments'):'';
                $user_key   = $this->hasParam('user_key')?$this->getParam('user_key'):'';
                $status     = false;
                $respose    = Utils::LightHouseApi('posts',array('user_key'=>$user_key,'post'=>$comment));
                if($respose['status'] == 200) {
                    $html = '<hr><div class="row"><div class="col-md-12"><p><strong>Posted By:</strong> '.$user_key.'</p><p><strong>Message :</strong> '.$comment.'</p></div></div>';
                    echo json_encode(array('success' => true,'comment' => $html));
                }
                else
                    echo json_encode(array('success' => false));

                exit();
            }
            else {
                if (__ROUTER_PATH == '/get-erc721') {
                    $data = array();
                    $recordsTotal = 0;
                    $user_key = $this->getParam('user_key');
                    $erc721 = Utils::etherscanApiECR721($user_key);
                    foreach ($erc721->result as $obj){
                        $recordsTotal++;
                        array_push($data,array(
                            'hash' => $obj->hash,
                            'age' => date('d/m/Y H:i:s',$obj->timeStamp),
                            'from' => $obj->from,
                            'to' => $obj->to,
                            'tokenID' => $obj->tokenID,
                            'tokenName' => $obj->tokenName,
                            'tokenSymbol' => $obj->tokenSymbol,
                            'contractAddress' => $obj->contractAddress,
                            'value' => $obj->tokenDecimal,
                            'gas' => $obj->tokenDecimal,
                            'gasPrice' => $obj->gasPrice
                        ));
                    }
                    echo json_encode(array('data' => $data,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsTotal));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-erc20') {
                    $data = array();
                    $recordsTotal = 0;
                    $user_key = $this->getParam('user_key');
                    $erc721 = Utils::etherscanApiECR20($user_key);
                    foreach ($erc721->result as $obj){
                        $recordsTotal++;
                        array_push($data,array(
                            'hash' => $obj->hash,
                            'age' => date('d/m/Y H:i:s',$obj->timeStamp),
                            'from' => $obj->from,
                            'to' => $obj->to,
                            'tokenName' => $obj->tokenName,
                            'tokenSymbol' => $obj->tokenSymbol,
                            'contractAddress' => $obj->contractAddress,
                            'value' => $obj->value,
                            'gas' => $obj->tokenDecimal,
                            'gasPrice' => $obj->gasPrice
                        ));
                    }
                    echo json_encode(array('data' => $data,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsTotal));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-snapshot') {
                    $data = array();
                    $recordsTotal = 0;
                    $user_key = $this->getParam('user_key');
                    $graphql = Utils::snapshotApi($user_key);
                    foreach ($graphql->data->votes as $obj){
                        $recordsTotal++;
                        array_push($data,array(
                            'voter' => $obj->voter,
                            'proposal' => $obj->proposal->title,
                            'space' => $obj->space->id
                        ));
                    }
                    echo json_encode(array('data' => $data,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsTotal));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-graphql') {
                    $data = array();
                    $user_key = $this->getParam('user_key');
                    //$user_key = '0xc43db41aa6649ddda4ef0ef20fd4f16be43144f7';
                    $graphql = Utils::graphqlApi($user_key);
                    foreach ($graphql->data as $coin => $obj){
                        foreach ($obj->address as $balances => $values){
                            foreach ($values->balances as $index =>$val){
                                if($val->value > 0){
                                    array_push($data,array(
                                        'name' => $coin,
                                        'symbol' => $val->currency->symbol,
                                        'value' => $val->value
                                    ));
                                }
                            }
                        }
                    }
                    echo json_encode(array('success' => true,'data' => $data));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-coins') {
                    $data = array();
                    $user_key = $this->getParam('user_key');
                    //$user_key = '0xc43db41aa6649ddda4ef0ef20fd4f16be43144f7';
                    $graphql = Utils::graphqlApi($user_key);
                    foreach ($graphql->data as $coin => $obj){
                        foreach ($obj->address as $balances => $values){
                            foreach ($values->balances as $index =>$val){
                                if($val->value > 0){
                                    array_push($data,array(
                                        'name' => $coin,
                                        'symbol' => $val->currency->symbol,
                                        'value' => $val->value
                                    ));
                                }
                            }
                        }
                    }
                    echo json_encode(array('success' => true,'data' => $data));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-dao') {
                    $data = array();
                    $user_key = $this->getParam('user_key');
                    $user_key = '0xc43db41aa6649ddda4ef0ef20fd4f16be43144f7';
                    $graphql = Utils::graphqlApi($user_key);
                    $symbols = array();
                    foreach ($graphql->data as $coin => $obj){
                        foreach ($obj->address as $balances => $values){
                            foreach ($values->balances as $index =>$val){
                                if($val->value > 0){
                                    $symbols[$val->currency->symbol] = 1;
                                }
                            }
                        }
                    }

                    $symbol_keys = array_keys($symbols);
                    $symbols_str = implode(',',$symbol_keys);
                    $response  = Utils::LightHouseApi('coins-dao',array('symbols'=>$symbols_str));
                    $coins_names = array();
                    $coins = array();
                    if($response['status'] == 200)
                        $coins = $response['data'];

                    foreach ($coins as $c){
                        $data[] = array(
                            'coin' => $c['symbol'],
                            'twitter' => (strlen($c['info_data']['twitter_username']) > 0) ?$c['info_data']['twitter_username']:'N/A',
                            'snap_id' => isset($c['dao_id'])?$c['dao_id']:'N/A',
                            'snap_name' => isset($c['dao_name'])?$c['dao_name']:'N/A'
                        );
                    }
                    echo json_encode(array('success' => true,'data' => $data));
                    exit();
                }
                elseif (__ROUTER_PATH == '/get-tweets' OR  __ROUTER_PATH == '/get-mentions') {
                    $data = array();
                    $recordsTotal = 0;
                   // $tw_user_name = $this->getParam('tw_user_name');
                    $tw_user_name = '0xSheran';
                    $respose = Utils::getTweet((__ROUTER_PATH =='/get-tweets')?'tweets':'mentions',$tw_user_name);
                    foreach ($respose->data as $index => $obj){
                        $recordsTotal++;
                        array_push($data,array('id'=> $obj->id,'text' => $obj->text));
                    }
                    echo json_encode(array('data' => $data,'recordsTotal'=>$recordsTotal,'recordsFiltered'=>$recordsTotal));
                    exit();
                }
            }
        }

        $commnets = array();
        $respose  = Utils::LightHouseApi('posts');
        if($respose['status'] == 200)
            $commnets = $respose['data'];

        $__page = (object)array(
            'title' => 'Dashboard',
            'tab' => 'messages',
            'commnets' => $commnets,
            'sections' => array(
                __DIR__ . '/../tpl/section.dashboard.php'
            ),
            'js' => array()
        );
        require_once app_template_path . '/base.php';
        exit();
    }
}
?>