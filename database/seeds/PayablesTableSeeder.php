<?php

use Illuminate\Database\Seeder;
use App\Payable;

class PayablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'title' => 'Material de escritório', 'value' => 123.21, 'expiration_date' => '2018-06-8', 'payed' => false],
            [ 'title' => 'Manutenção de PC', 'value' => 103, 'expiration_date' => '2018-02-2', 'payed' => false],
            [ 'title' => 'Manutenção de Pcs', 'value' => 123.01, 'expiration_date' => '2018-1-5', 'payed' => true],
            [ 'title' => 'Despesas Variadas', 'value' => 243.21, 'expiration_date' => '2017-12-21', 'payed' => false],
            [ 'title' => 'Manutenção de Pcs', 'value' => 143.21, 'expiration_date' => '2018-12-3', 'payed' => false],
            [ 'title' => 'Despesas Variadas', 'value' => 121, 'expiration_date' => '2018-12-8', 'payed' => false],
            [ 'title' => 'Despesas Variadas', 'value' => 2121, 'expiration_date' => '2018-12-8', 'payed' => false],
            [ 'title' => 'Despesas Variadas', 'value' => 1121.90, 'expiration_date' => '2018-12-8', 'payed' => false],
        ];

        Payable::insert($data);
    }
}
