<?php
/**
 * *************************************************************************
 *
 * Copyright (c) 2014 Baidu.com, Inc. All Rights Reserved
 *
 * ************************************************************************
 */
/**
 *
 * @file hello.php
 * @encoding UTF-8
 *
 *
 *         @date 2015年3月10日
 *
 */

require_once '../sdk.php';

$config_version=$_REQUEST['config_version'];
$current_version=$_REQUEST['current_version'];
$version_description=$_REQUEST['version_description'];
$download_url=$_REQUEST['download_url'];


// 创建SDK对象.
$sdk = new PushSDK();

$channelId = '3874497173868345435';

// message content.
$message = array (
    'config_version'=>$config_version,
    'current_version'=>$current_version,
    'version_description'=>$version_description,
    'download_url'=>$download_url
);
var_dump($message);

// 设置消息类型为 通知类型.
$opts = array (
    'msg_type' => 0
);

// 向目标设备发送一条消息
$rs = $sdk -> pushMsgToAll($message, $opts);

// 判断返回值,当发送失败时, $rs的结果为false, 可以通过getError来获得错误信息.
if($rs === false){
   print_r($sdk->getLastErrorCode());
   print_r($sdk->getLastErrorMsg());
}else{
    // 将打印出消息的id,发送时间等相关信息.
    print_r($rs);
}

echo "done!";

