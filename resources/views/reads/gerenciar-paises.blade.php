@include('components.header')
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Países</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-pais"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-pais') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($paises as $pais)
                    <option value="{{$pais->CD_PAIS}}">{{$pais->CD_PAIS}} - {{$pais->NM_PAIS}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-info btn-lg btn-block" value="Editar">
            
        </div>
        </form>
        <hr>
    
        @if ($errors->any())
        <hr>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif

        @if (session()->get('success'))
        <hr>
            <div class="alert alert-success py-2">
                {{session()->get('success')}}.
            </div>
        @endif
    
        <div class="table-responsive text-center">
        <table class="table table-hover">
        <thead>
        <tr>
        
            <th scope="col">Código do País</th>
            <th scope="col">Nome do País</th>
            <th scope="col">População do País</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($paises as $pais)
        <tr>
            <th scope="row">{{$pais->CD_PAIS}}</th>
            <td>{{$pais->NM_PAIS}}</td>
            <td>{{$pais->QT_PPLC_PAIS}}</td>
            <td><a href="{{ route('editar-pais', $pais->CD_PAIS)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-pais', $pais->CD_PAIS)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">X</button>
                </form></td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div> 
    </div>
@include('components.footer')