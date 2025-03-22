<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function confirm(Request $request){
        // $contact = $request->only(['カラムを書く',])
        // return 
    }
    // 送信されたデータを受け取るためにRequest型を受け取るようにする
    // 変数に受け取ったデータを格納
    // ビューの読み込み
}
