<?php

namespace App\Http\Controllers;

use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    
      public function index(){
       
        return view('welcome');
     }
}
