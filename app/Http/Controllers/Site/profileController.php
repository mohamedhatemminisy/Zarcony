<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\TransactionsRequest;

class profileController extends Controller
{
    public function profile (){
        $user = User::find(Auth()->user()->id);
    	return view('site.profile',compact('user'));
    }

    public function update_profile(ProfileRequest $request){
        $user = User::find($request->id);
        $user -> name  = $request->name;
        $user -> email = $request->email;
        $user -> password = $request->password ? Bcrypt($request->input('password')) : $user -> password;
        $user -> save();
        return redirect()->route('home');
    }

    public function transfer (){
        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $user = User::find(Auth()->user()->id);
        return view('site.transfer',compact('users','user'));
    }

    public function transfer_money(TransactionsRequest $request){
        $last_hour_transactions = array_sum(\DB::table('transactions')->where('sender_id',Auth()->user()->id)
        ->where('created_at', '>=', \Carbon\Carbon::now()->subHour())->pluck('amount')->toArray());

        if($last_hour_transactions +  $request->amount > 200  || $request->amount > 200){
            return redirect()->back()->with(['error' => 'You can tansfer only 200 el for hour']);
        }else{
        $user_balance = (int)User::find( Auth()->user()->id)->balance;
        if($user_balance > $request->amount){
            $sender = User::find( Auth()->user()->id);
            $sender->balance -=  $request->amount;
            $sender->save();

            $receiver = User::find( $request->receiver_id);
            $receiver->balance += $request->amount;
            $receiver->save();
            $status = 'success';
        }
        else{
            $status = 'fail';
        }

        $transaction = new Transaction();
        $transaction->holder_name = $request->holder_name;
        $transaction->card_number = $request->card_number;
        $transaction->expiry_date = $request->expiry_date;
        $transaction->cvc_code = $request->cvc_code;
        $transaction->amount = $request->amount;
        $transaction->sender_id =  Auth()->user()->id;
        $transaction->receiver_id = $request->receiver_id;
        $transaction->status = $status;
        $transaction->save();
        return redirect()->back()->with(['success' => 'Transaction added successfully']);
    }

    }

    public function my_transactions(){
        $transactions = Transaction::where('sender_id',Auth()->user()->id)
        ->orWhere('receiver_id',Auth()->user()->id)->paginate(5);
        return view('site.my_transactions',compact('transactions'));
    }
}