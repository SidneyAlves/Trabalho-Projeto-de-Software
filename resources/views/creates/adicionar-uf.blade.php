@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar UF</h1>
                
                <form action="{{ route('ufs.store') }}" method="post">
                @csrf
                <!-- Campo de Sigla -->
                <div class="form-group">
                    <label>Sigla</label>
                    <input type="text" required maxlength="2" class="form-control" placeholder="Sigla" id="sigla" name="sigla">
                </div>
                
                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" required class="form-control" placeholder="Nome" id="nome" name="nome">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            @if (session()->get('success'))
                <div class="alert alert-success py-2">
                    {{session()->get('success')}}.
                </div>
            @endif

        </div>

    </div>    

@include('components.footer')