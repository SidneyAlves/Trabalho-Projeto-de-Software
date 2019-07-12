@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar País</h1>
                
                <form action="{{ route('pais.store') }}" method="post">
                @csrf
                <!-- Campo de Código -->
                <div class="form-group">
                    <label>Código do País</label>
                    <input type="text" required maxlength="2" class="form-control" placeholder="Código" id="codigo" name="codigo">
                </div>

                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome">
                </div>

                <!-- Campo de quantidade de passageiros -->
                <div class="form-group">
                    <label>População</label>
                    <input type="number" required class="form-control" placeholder="População" id="populacao" name="populacao" min="0" max="5000000000" step="1">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

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

    </div>    

    @include('components.footer')