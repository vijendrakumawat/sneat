<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectionsController extends Controller
{
    public function index(){
        return view('admins.connection');
    }
}
