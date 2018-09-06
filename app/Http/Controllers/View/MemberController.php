<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

header("Content-type: text/html; charset=utf-8"); 

class MemberController extends Controller
{
  public function toLogin($value='')
  {
    return view('login');
  }

  public function toRegister($value='')
  {
    return view('register');
  }
  
  public function toTest($value='')
  {
	$users   = DB::select('select * from userbase');
    var_dump($users);	
	$row = ['name'=>'jim','year'=>20];
	//$num = DB::table('userbase')->insertGetId($row);
	$update = DB::table('userbase')->where('id',14)->delete();
	return view('test')->with('num',$update);
  }
}
