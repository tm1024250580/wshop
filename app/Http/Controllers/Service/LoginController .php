<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Member;
use App\Entity\TempPhone;
use App\Entity\TempEmail;
use App\Models\M3Email;
use App\Tool\UUID;
use Mail;

class LoginController extends Controller
{
  public function register(Request $request)
  {
    $name = $request->input('name','');
    $password = $request->input('password', '');
    $confirm = $request->input('confirm', '');
    $validate_code = $request->input('validate_code', '');

    $m3_result = new M3Result;

    if($name == '') {
      $m3_result->status = 1;
      $m3_result->message = 'name不能为空';
      return $m3_result->toJson();
    }
    if($password == '' || strlen($password) < 6) {
      $m3_result->status = 2;
      $m3_result->message = '密码不少于6位';
      return $m3_result->toJson();
    }
    if($confirm == '' || strlen($confirm) < 6) {
      $m3_result->status = 3;
      $m3_result->message = '确认密码不少于6位';
      return $m3_result->toJson();
    }
    if($password != $confirm) {
      $m3_result->status = 4;
      $m3_result->message = '两次密码不相同';
      return $m3_result->toJson();
    }

    

        $member = new Member;
        $member->phone = $phone;
        $member->password = md5('bk' + $password);
        $member->save();

        $m3_result->status = 0;
        $m3_result->message = '注册成功';
        return $m3_result->toJson();
      
  }
}
