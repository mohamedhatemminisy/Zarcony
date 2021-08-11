<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $no_of_rows = 500000;
        for( $i=0; $i < $no_of_rows; $i++ ){


            $year = rand(2021, 2025);
            $month = rand(1, 12);
            $day = rand(1, 28);
            $date = Carbon::create($year,$month ,$day);

            $status = array(
                'fail',
                'success',
            );
            $key = array_rand($status);
            $status[$key];
            $transaction = array(
                'holder_name' => Str::random(10),
                'card_number' => mt_rand(1000000000000000, 9999999999999999),
                'expiry_date' =>   $date->format('Y-m-d'),
                'cvc_code' =>  mt_rand(10, 999),
                'amount' => mt_rand(10, 999),
                'sender_id' => User::all()->random()->id,
                'receiver_id' => User::all()->random()->id,
                'status' =>  $status[$key],
                'created_at' => now(),
                'updated_at' => now(),

            );
        
            Transaction::insert( $transaction );
            $transaction=null;
        }
    }
}
