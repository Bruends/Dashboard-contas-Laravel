<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddPayableRequest;
use App\Payable;

class PayableController extends Controller
{
    public function index(){
        $payables = Payable::all();
        
    
        return view('dashboard.payables.index', ['payables' => $payables]);
    }

    public function addPage(){
        return view('dashboard.payables.add');
    }

    public function store(AddPayableRequest $request){
        $reqData = $request->all();
        $reqData['payed'] = isset($reqData['payed']);
        
        if(!$reqData['expiration_date']){
            unset($reqData['expiration_date']); 
        }       
        
        $response = Payable::create($reqData);

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

    public function deletePage($id){ 
        $payable = payable::find($id);

        if(!$payable){
            // em caso de falha
            return redirect()
                ->back()
                ->with('error', 'Recebimento não encontrado!'); 
        }

        return view('dashboard.payables.delete', ['payable' => $payable]);        
    }

    public function delete(Request $request){ 
        $payable = payable::find($request->id)->get()->first();

        $response = $payable->delete();

       if($response){
            return redirect()
                ->route('payables')
                ->with('success', 'Deletado com sucesso !');
        }

        // em caso de falha
        return redirect()
                ->back()
                ->with('error', 'Erro ao deletar o recebimento !');        
    }

    public function updatePage($id){ 
        $payable = payable::find($id);

        if(!$payable){
            // em caso de falha
            return redirect()
                ->back()
                ->with('error', 'Recebimento não encontrado!'); 
        }

        return view('dashboard.payables.update', ['payable' => $payable]);        
    }

    public function update(Request $request){
        $reqData = $request->all();
        
        if(!$reqData['expiration_date']){
            unset($reqData['expiration_date']); 
        }
        
        $reqData['payed'] = isset($reqData['payed']);

        $payable = Payable::find($reqData['id']);

        $response = $payable->update($reqData);

        if($response){
            return redirect()
                ->route('payables')
                ->with('success', 'Alterado com sucesso !');
        }

        // em caso de falha
        return redirect()
                ->back()
                ->with('error', 'Erro ao alterar !'); 
    }
}
