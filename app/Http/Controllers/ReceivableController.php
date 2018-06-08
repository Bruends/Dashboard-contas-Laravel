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
        
        if(!$reqData['expiration_date']){
            unset($reqData['expiration_date']); 
        }       
        
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

    public function deletePage($id){ 
        $receivable = Receivable::find($id);

        if(!$receivable){
            // em caso de falha
            return redirect()
                ->back()
                ->with('error', 'Recebimento não encontrado!'); 
        }

        return view('dashboard.receivables.delete', ['receivable' => $receivable]);        
    }

    public function delete(Request $request){ 
       $formData = $request->all();
       $receivable = Receivable::find($formData['id']);
       
        $response = $receivable->delete();

       if($response){
            return redirect()
                ->route('receivables')
                ->with('success', 'Deletado com sucesso !');
        }

        // em caso de falha
        return redirect()
                ->back()
                ->with('error', 'Erro ao deletar o recebimento !');        
    }

    public function updatePage($id){ 
        $receivable = Receivable::find($id);

        if(!$receivable){
            // em caso de falha
            return redirect()
                ->back()
                ->with('error', 'Recebimento não encontrado!'); 
        }

        return view('dashboard.receivables.update', ['receivable' => $receivable]);        
    }

    public function update(Request $request){
        $reqData = $request->all();
        
        if(!$reqData['expiration_date']){
            unset($reqData['expiration_date']); 
        }
        
        $reqData['payed'] = isset($reqData['payed']);

        $receivable = Receivable::find($reqData['id']);

        $response = $receivable->update($reqData);

        if($response){
            return redirect()
                ->route('receivables')
                ->with('success', 'alterado com sucesso !');
        }

        // em caso de falha
        return redirect()
                ->back()
                ->with('error', 'Erro ao alterar o recebimento !');
    }
}
