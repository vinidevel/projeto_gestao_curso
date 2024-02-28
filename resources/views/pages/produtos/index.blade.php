@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>

  </div>
  <div>
    <form action="" method="GET">
        <input type="text" name="pesquisar" placeholder="Digite o nome">
        <button class="btn btn-primary  btn-sm">Pesquisar</button>
        <a type="button" href="{{route('produtos.create')}}" class="btn btn-success float-end">
            Incuir Produto
        </a>
    </form>
  </div>

  <div class="table-responsive mt-4">
    @if ($produtos->isEmpty())
        <p>Não existe dados</p>
    @else
        

    <table class="table table-striped table-sm">
      <thead>
        <tr>
     
          <th scope="col">Nome</th>
          <th scope="col">Valor</th>
          <th scope="col">Ações</th>
      
        </tr>
      </thead>
      <tbody>
        @foreach ($produtos as $produto)
            
    
        <tr>
          <td>{{$produto->nome}}</td>
          <td>{{'R$' . ' ' . number_format($produto->valor, 2, ',', '.')}}</td>
          <td>
            <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-light btn-sm">Editar</a>
          
            <meta name='csrf-token' content=" {{ csrf_token() }}" />
            <a onclick="deleteRegistroPaginacao( '{{ route('produtos.delete') }} ', {{ $produto->id }}  )"
                class="btn btn-danger btn-sm">
                Excluir
            </a>
          </td>
        </tr>

        @endforeach
      </tbody>
    </table> 
    @endif
  </div>
    
@endsection