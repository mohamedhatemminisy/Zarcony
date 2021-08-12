<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use DB;

class TransactionController extends Controller
{
    public function index(Request $request){

        $params = $request->all();

        if($request->_token)
        { 
            $transactions = $this->filter($params['sender'] , $params['rseciever'] , $params['status'],$params['amount']); 
        }
        else
        { 
        $transactions = Transaction::orderBy('id', 'desc')->paginate(50);
        }
        $users = User::get();

        return view('dashboard.transactions.index',compact('transactions','users'));
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


    private function filter($sender ,$rseciever ,$status ,$amount)
    {
        $transactions = Transaction::orderBy('id', 'desc');

        if($sender != '0')
        {
            $transactions = $transactions->where('sender_id', $sender);
        }
        if($rseciever != '0')
        {
            $transactions = $transactions->where('receiver_id', $rseciever);
        }
        if($status != '0')
        {
            $transactions = $transactions->where('status', $status);
        }
        if($amount != null)
        {
            $transactions = $transactions->where('amount', $amount);
        }
        return $transactions->paginate(50);
    }



}
