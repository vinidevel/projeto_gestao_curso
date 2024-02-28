<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Produto $produtos)
     {
         $this->produtos = $produtos;
     }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $produtos = $this->produtos->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
        $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        Produto::create($data);
            Toastr::success('Gravado com sucesso');
        return redirect()->route('produtos.index');
        }

        return view('pages.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados atualizados com sucesso.');
            return redirect()->route('produtos.index');
        }
        $findProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.atualiza', compact('findProduto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
  public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        Toastr::success('Dados excluídos com sucesso.');
        return response()->json(['success' => true]);
    }
}
