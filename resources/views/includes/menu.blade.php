
<div class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url ('/') }}">E S S E N C E</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right menu-up">
                <li><a href="{{ route ('clientes.index') }}">Clientes</a></li>
                <li><a href="{{ route ('livros.index') }}">Livros</a></li>
                <li><a href="{{ route ('emprestimos.index') }}">Empréstimos</a></li>
                <li><a href="{{ route ('reservas.index') }}">Reservas</a></li>
            </ul>
        </div>
    </div>
</div>

