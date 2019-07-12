@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar País</h1>
                
                <form method="post" action="{{ route('pais.update', $pais->CD_PAIS) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo de Código -->
                <div class="form-group">
                    <label>Código do País</label>
                    <input type="text" class="form-control" required maxlength="2" placeholder="Código" id="codigo" name="codigo" value="{{$pais->CD_PAIS}}">
                </div>

                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" value="{{$pais->NM_PAIS}}">
                </div>

                <!-- Campo de quantidade de passageiros -->
                <div class="form-group">
                    <label>População</label>
                    <input type="number" class="form-control" required placeholder="População" id="populacao" name="populacao" min="0" max="5000000000" step="1" value="{{$pais->QT_PPLC_PAIS}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-pais', $pais->CD_PAIS)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-lg btn-block" type="submit">Deletar</button>
                </form>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>          
                <br /> 
                @endif

            </div>
        </div>

    </div>    

@include('components.footer')