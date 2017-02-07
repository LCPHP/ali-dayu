# ali-dayu
> 阿里大于接口类

### demo
```php
<?php
use niklaslu\Dayu;
require_once 'ali-dayu/src/Dayu.php';

$config = [
  'appkey' => 'xxx',
  'secret' => 'xxx.......................'
];

$Dayu = new Dayu($config);

$smsData = [
    'extend' => '123456',
    'sms_type' => 'normal',
    'sms_free_sign_name' => 'sing_name',
    'sms_param' => [
        'param1' => 'param_data'
    ],
    // 'rec_num' => '发送的手机号',
    'rec_num' => ['phone1' , 'phone2'],
    'sms_template_code' => 'SMS_xxxxxx'
];

$result = $Dayu->smsSend($smsData);
```
