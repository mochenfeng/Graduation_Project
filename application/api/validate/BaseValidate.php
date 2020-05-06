<?php


namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck() {
        //获取参数
        //对这些参数做校验
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
            throw $e;
        } else {
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule = '', $data = '', $filed = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0)> 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function isMobile($value)
    {
        // 电话号码
        $rule = "^(0[0-9]{2,3}/-)?([2-9][0-9]{6,7})+(/-[0-9]{1,4})?$^";

        // 手机号码
//        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function isNotEmpty($value, $rule = '', $data = '', $filed = '') {
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }

    public function getDataByRule($arrays) {
        if (array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)) {
            // 不允许包含user_id或者uid，防止恶意覆盖user_id外键
            throw new ParameterException([
                'msg' => '参数中包含有非法的参数名user_id或者uid'
            ]);
        }
        $newArray = [];
        foreach ($this->rule as $key => $value) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
}