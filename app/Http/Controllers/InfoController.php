<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receivable;
use App\Payable;

class InfoController extends Controller
{
    public function index(){
        // recebimentos, recebimentos atrasados, pagamentos, pagamentos atrasados
        $valuesData = [0, 0, 0, 0];
        // inadimplêntes, pagamentos atrasados
        $countData = [0,0];

        $receivables = Receivable::all();
        $payables = Payable::all();
        
        foreach($receivables as $receivable){
            // recebimento não pago
            if(!$receivable['payed']) 
                $valuesData[0] = round($valuesData[0] + $receivable['value'] , 2);

            if(!$receivable['payed'] && $receivable['expiration_date'] < Date('m/d/Y')) {
                // recebimento atrasado
                $valuesData[1] = round($valuesData[1] + $receivable['value'] , 2);
                // contagem de inadimplêntes
                $countData[0]++;                
            }
        }

        foreach($payables as $payable){
            // conta não paga
            if(!$payable['payed']) 
            $valuesData[2] = round($valuesData[2] + $payable['value'] , 2);
            
            if(!$payable['payed'] && $payable['expiration_date'] < Date('m/d/Y')){
                // total contas atrasada
                $valuesData[3] = round($valuesData[3] + $payable['value'] , 2);
                // contagem contas atrasadas
                $countData[1]++;
            }
        }      
      
        return view('dashboard.infos.index', ['valuesData' => $valuesData, 'countData' => $countData]);
    }
    
   
}
