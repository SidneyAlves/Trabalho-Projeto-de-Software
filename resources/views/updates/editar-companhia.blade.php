@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Companhia Aérea</h1>
                
                <form method="post" action="{{ route('companhia.update', $companhia->CD_CMPN_AEREA) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo de Código -->
                <div class="form-group">
                    <label>Código da Companhia Aérea</label>
                    <input type="text" required maxlength="4" class="form-control" placeholder="Código" id="codigo" name="codigo" value="{{$companhia->CD_CMPN_AEREA}}">
                </div>

                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" required class="form-control" placeholder="Nome" id="nome" name="nome" value="{{$companhia->NM_CMPN_AEREA}}">
                </div>

                <!-- Campo do País de Origem -->
                <div class="form-group">
                    <label>Escolha o País de Origem</label>
                    <select class="form-control adicionar-companhia-pais" id="pais" name="pais">
                    @foreach($paises as $pais)
                    <option value="{{$pais->CD_PAIS}}">{{$pais->CD_PAIS}} - {{$pais->NM_PAIS}}</option>
                    @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-companhia', $companhia->CD_CMPN_AEREA)}}" method="post">
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