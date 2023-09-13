<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BanklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path('walletBankList.json'));
        $data = json_decode($json, true);

        foreach ($data as $user) {
            DB::table('wallet_transaction_bank_lists')->insert([
                'bank_code' => $user['bank_code'],
                'bank_short_name' => $user['bank_short_name'],
                'bank_full_name' => $user['bank_full_name'] ,
                'bank_icon' => $user['bank_icon'],
            ]);
        }
    }
}