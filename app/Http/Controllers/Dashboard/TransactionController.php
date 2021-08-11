<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use DB;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::paginate(50);
        return view('dashboard.transactions.index',compact('transactions'));
    }

    public function statistics (){
        $data = DB::table('transactions')
        ->select(
         DB::raw('status as status'),
         DB::raw('count(*) as number'))
        ->groupBy('status')
        ->get();
      $array[] = ['Status', 'Number'];
      foreach($data as $key => $value)
      {
       $array[++$key] = [$value->status, $value->number];
      }
      return view('dashboard.transactions.statistics')->with('status', json_encode($array));


    }
}
