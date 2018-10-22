<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

Session::start();


class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }




  public function index()
 {
      return view('admin.adminMaincontent');
 }


}
