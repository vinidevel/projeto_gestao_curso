<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('dashboard.index')}}">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('vendas.index')}}">
            <span  class="align-text-bottom"></span>
            Venda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('produtos.index')}}">
            <span  class="align-text-bottom"></span>
            Produtos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('clientes.index')}}">
            <span  class="align-text-bottom"></span>
            Clientes
          </a>
        </li>
      
      </ul>

      
    </div>
  </nav>