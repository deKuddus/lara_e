<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
Session::start();
class SuperAdminController extends Controller
{
    public function logout()
    {
    	Session::flush();
    	return redirect(route('admin.login'));
    }
}
