<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

   public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.vendas.paginacao', compact('findVendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastrarVendas(FormRequestVenda $request)
    {
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto =  Produto::all();
        $findCliente =  Cliente::all();

        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;

            Venda::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('vendas.index');
        }
        // mostrar os dados

        return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function enviaComprovantePorEmail($id)
     {
         $buscaVenda = Venda::where('id', '=', $id)->first();
         $produtoNome = $buscaVenda->produto->nome;
         $clienteEmail = $buscaVenda->cliente->email;
         $clienteNome = $buscaVenda->cliente->nome;
 
         $sendMailData = [
             'produtoNome' => $produtoNome,
             'clienteNome' => $clienteNome
         ];
 
        //  Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));
 
         Toastr::success('Email enviado com sucesso.');
         return redirect()->route('vendas.index');
     }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
