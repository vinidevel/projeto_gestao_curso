<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.clientes.index', compact('findCliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormRequestCliente $request)
    {
        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            Cliente::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('clientes.index');
        }
        // mostrar os dados
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestCliente $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('clientes.index');
        }
        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        Toastr::success('Dados excluídos com sucesso.');
        return response()->json(['success' => true]);
    }
}
