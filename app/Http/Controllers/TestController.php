<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //どのファイルを表示するか指定
    public function test() {
      return view('test');
    }
}
