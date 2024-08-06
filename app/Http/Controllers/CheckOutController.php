<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkout()
    {
        $users = Auth::user();
        return view('user.checkout',compact('users'));
    }


}
