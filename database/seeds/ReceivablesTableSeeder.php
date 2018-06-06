<?php

use Illuminate\Database\Seeder;
use App\Receivable;

class ReceivablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'client' => 'Empresa 1', 'value' => 123.21, 'expiration_date' => '2018-06-8', 'payed' => false],
            [ 'client' => 'Empresa 2', 'value' => 1203, 'expiration_date' => '2018-02-2', 'payed' => false],
            [ 'client' => 'Empresa 1', 'value' => 1233.01, 'expiration_date' => '2018-1-5', 'payed' => true],
            [ 'client' => 'Empresa 3', 'value' => 243.21, 'expiration_date' => '2017-12-21', 'payed' => false],
            [ 'client' => 'Empresa 4', 'value' => 1243.21, 'expiration_date' => '2018-12-3', 'payed' => false],
            [ 'client' => 'Empresa 3', 'value' => 121, 'expiration_date' => '2018-12-8', 'payed' => false],
            [ 'client' => 'Empresa 3', 'value' => 2121, 'expiration_date' => '2018-12-8', 'payed' => false],
            [ 'client' => 'Empresa 3', 'value' => 11121.90, 'expiration_date' => '2018-12-8', 'payed' => false],
        ];

        Receivable::insert($data);
    }
}
