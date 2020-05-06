<?php


namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;

class Pay extends BaseController
{
//    protected $beforeActionList = [
//        'checkExclusiveScope' => ['only' => 'getPreOrder']
//    ];
//
//    public function getPreOrder($id = '') {
//        (new IDMustBePostiveInt())->goCheck();
//        $pay = new PayService($id);
//        return $pay->pay();
//    }
//
//    public function redirectNotify()
//    {
//        $notify = new WxNotify();
//        $notify->handle();
//    }
//
//    public function receiveNotify()
//    {
//        // 检测库存量
//        // 更新订单的status状态
//        // 减库存
//        // 如果成功处理，返回微信成功处理的信息。否则，返回没有成功处理的信息
//        $notify = new WxNotify();
//        $notify->handle();
//
//        $xmlData = file_get_contents('php://input');
//        $result = curl_post_raw('http:/z.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=13133',
//            $xmlData);
//    }
}