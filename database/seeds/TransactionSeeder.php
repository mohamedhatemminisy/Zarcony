<?php

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $end_date = '2023-08-03 23:25:49';
        $min = now();
        $max = strtotime($end_date);

        $no_of_rows = 5;
        for( $i=0; $i < $no_of_rows; $i++ ){
            $transaction = array(
                'holder_name' => Str::random(10),
                'card_number' => mt_rand(1000000000000000, 9999999999999999),
                'expiry_date' =>  now(),
                'cvc_code' =>  mt_rand(10, 999),
                'amount' => mt_rand(10, 999),
                'sender_id' => User::all()->random()->id,
                'receiver_id' => User::all()->random()->id,
                'status' => 'success',
                'created_at' => now(),
                'updated_at' => now(),

            );
        
            Transaction::insert( $transaction );
            $transaction=null;
        }
    }
}
