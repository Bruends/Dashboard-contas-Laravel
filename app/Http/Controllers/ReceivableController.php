<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddReceivableRequest;
use App\Receivable;

class ReceivableController extends Controller
{
    public function index(){
        $rec = Receivable::all();
        
    
        return view('dashboard.receivables.index', ['receivables' => $rec]);
    }
    
    public function addPage(){
        return view('dashboard.receivables.add');
    }

    public function store(AddReceivableRequest $request){
        $reqData = $request->all();
        $reqData['payed'] = isset($reqData['payed']);
        
        $response = Receivable::create($reqData);

        if($response){
            return redirect()
                ->back()
                ->with('success', 'Recebimento adicionado com sucesso !');
        }

        // em caso de falha
        return redirect()
                ->back()
                ->with('error', 'Erro ao adicionar o recebimento !');
    }

   
}
