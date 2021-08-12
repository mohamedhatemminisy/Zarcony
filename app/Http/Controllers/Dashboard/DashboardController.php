<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $total_users = count(User::get());
        // $total_transactions = Transaction::get()->count();
        // $success_transactions = count(Transaction::where('status','success')->get());
        // $fail_transactions = count(Transaction::where('status','fail')->get());
        $total_transactions = 100;
        $success_transactions = 50;
        $fail_transactions = 50;

    	return view('dashboard.index',compact('total_users','total_transactions'
        ,'success_transactions','fail_transactions'));
    }
}