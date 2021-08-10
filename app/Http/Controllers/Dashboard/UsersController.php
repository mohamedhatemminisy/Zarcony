<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class UsersController extends Controller
{
    public function index(){
         $users = User::get();
         return view('dashboard.users.index',compact('users'));
    }

    public function user_transactions ($id){
        $transactions = Transaction::where('sender_id',$id)
        ->orWhere('receiver_id',$id)->get();
        return view('dashboard.users.transactions',compact('transactions'));
    }
}
