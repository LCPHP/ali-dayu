<?php
namespace niklaslu;
class Dayu {
    
    private $appkey = NULL;
    private $secret = NULL;
    private $client = NULL;
    
    public function __construct($config){
        
        require_once 'sdk/TopSdk.php';
        
        $client = new \TopClient();    
        $this->appkey = $config['appkey'];
        $this->secret = $config['secret'];
        
        $client->appkey = $this->appkey;
        $client->secretKey = $this->secret;
        $client->format = 'json';
        
        $this->client = $client;
        
    }
    
    public function smsSend($data){
        
        $req = new  \AlibabaAliqinFcSmsNumSendRequest();
        $req->setExtend($data['extend']);
        $req->setSmsType($data['sms_type']);
        $req->setSmsFreeSignName($data['sms_free_sign_name']);
        
        $smsParam = json_encode($data['sms_param']);
        $req->setSmsParam($smsParam);
        
        // 发送给多人
        if (is_array($data['rec_num'])){
            $data['rec_num'] = implode(',', $data['rec_num']);
        }
        
        $req->setRecNum($data['rec_num']);
        $req->setSmsTemplateCode($data['sms_template_code']);
        
        $resp = $this->client->execute($req);
        return $this->returnData($resp);
    }
    
    public function returnData($data){
        
        if (isset($data->result)){
            return ['status' => 1 , 'data' => $data->result];
        }
        
        if (isset($data->code)){
            return ['status' => 0 , 'data'=> $data , 'msg'=>isset($data->msg) ? $data->msg : ''];
        }
    }
}
