<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Clientes;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Clientes $cliente) {

        $this->cliente = $cliente;
    }

    public function index (Request $request) {

        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscarRegistro = Clientes::find($id);
        $buscarRegistro->delete();

        return response()->json(['success'=>true]);
    }

    public function cadastrarCliente(FormRequestClientes $request){
        if ($request->method() == "POST") {
            $data = $request->all();
            Clientes::create($data);
             Toastr::success('Gravado com sucesso');
             return redirect()->route('clientes.index');
        }

        return view('pages.clientes.create');
       
    } 

    public function atualizarCliente(Request $request, $id){
        if ($request->method() == "PUT") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRequistro = Clientes::find($id);
            $buscaRequistro->update( $data);

            Toastr::success('Atualizado com sucesso');
             return redirect()->route('clientes.index');
        }
        $findProduto = Clientes::where('id', '=', $id)->first();
        return view('pages.clientes.atualiza', compact('findProduto'));
       
    } 



}
