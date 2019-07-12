@include('components.header')

    <div class="container-fluid">
        <div class="container">
            <h1 class="text-center">Para acessar o Controle Interno, digite a senha padrão de acesso.</h1>
            <div class="col-md-6 offset-md-3">
            <form action="{{ route('logar') }}" method="post">
            @csrf  
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">

            </form>

            @if (session()->get('error'))
            <hr>
                <div class="alert alert-danger py-2">
                    {{session()->get('error')}}.
                </div>
            @endif
            </div>
        </div>
    </div>

    @include('components.footer')