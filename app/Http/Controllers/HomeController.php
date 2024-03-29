<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function redirect()
    {
        $userType = Auth::user()->usertype;
        if($userType == '1'){
            return view('admin.home');
        }else{
            $data = Product::all();
            return view('home.user',compact('data'));
        }
    }

    public function index() {
        $data = Product::all();
        return view('home.user', compact('data'));
    }

    public function detail($id) {
        $data = Product::find($id);
        return view('home.detail', compact('data'));
    }

}
