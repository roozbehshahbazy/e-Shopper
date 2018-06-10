<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
        public function __construct()
    {
    	$this->middleware('auth:admin');
    }


    public function showCustomers(){
    	return view('admin/customers/admin-customers');
    }


    public function showDashboard(){
		return view('admin/dashboard/admin-dashboard');
	}


	public function showOrders(){
    	return view('admin/orders/admin-orders');
    }


    public function showProducts(){
    	return view('admin/products/admin-products');
    }
}

