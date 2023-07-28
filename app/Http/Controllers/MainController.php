<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class MainController extends Controller
{
    public function viewHomePage(){

        return view('home');
    }
}
