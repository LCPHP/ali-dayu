<?php
use niklaslu\Dayu;
require_once 'ali-dayu/src/Dayu.php';

$config = [
  'appkey' => '23317582',
  'secret' => 'db7e5a15c107b0ee76cee7d384c912ec'
];

$Dayu = new Dayu($config);

$smsData = [
    'extend' => '123456',
    'sms_type' => 'normal',
    'sms_free_sign_name' => 'warm家公寓',
    'sms_param' => [
        'address' => '测试地址',
        'date' => '今天',
        'date2' => '昨天'
    ],
    'rec_num' => ['18676669410' , '13538278065'],
    'sms_template_code' => 'SMS_6340224'
];

$template = '${address}于${date}申请退/转租，请于${date2}完成资料审核。';
$result = $Dayu->smsSend($smsData);

var_dump($result);