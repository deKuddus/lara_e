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

	/*public function __construct()
    {
        $this->middleware('admin',['except' =>'logout']);
    }*/


   public function login()
   {
   		return view('admin.adminlogin');
   }

   public function login_complete(Request $request)
   {
  		$request->validate([
        'admin_email' => 'required|email',
        'admin_password' => 'required'
      ]);
      $email =  $request->admin_email;
      $pass = md5($request->admin_password);
    	
    	$result = DB::table('tbl_admin')
                ->where('admin_email',$email)
                ->where('admin_password', $pass)
                ->first();

      if($result){
        Session::put('admin_name',$result->admin_name);
        Session::put('admin_id',$result->admin_id);
        return redirect('admin/dashboard');
      }
      Session::put('error',"invalid credentials");
      return redirect(route('admin.login'));
    	
   }

   public function show_admin_registration()
   {
   		return view('admin.adminregistration');
   }

  


   public function index()
   {
   		return view('admin.adminMaincontent');
   }


}
