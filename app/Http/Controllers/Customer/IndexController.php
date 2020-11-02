<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data = [
            'body_class' => null,
        ];
        return view('theme-back.app', $data);
    }
}
