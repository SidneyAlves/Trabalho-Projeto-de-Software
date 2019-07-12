@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar UF</h1>
                
                <form method="post" action="{{ route('ufs.update', $uf->SG_UF) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo de Sigla -->
                <div class="form-group">
                    <label>Sigla</label>
                    <input type="text" required maxlength="2" class="form-control" placeholder="Sigla" id="sigla" name="sigla" value="{{$uf->SG_UF}}">
                </div>
                
                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" required class="form-control" placeholder="Nome" id="nome" name="nome" value="{{$uf->NM_UF}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-uf', $uf->SG_UF)}}" method="post">
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