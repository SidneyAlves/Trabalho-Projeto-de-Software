@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Companhias Aéreas</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-companhia"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-companhia') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($companhias as $companhia)
                    <option value="{{$companhia->CD_CMPN_AEREA}}">{{$companhia->CD_CMPN_AEREA}} - {{$companhia->NM_CMPN_AEREA}}</option>
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
            <th scope="col">Código da Companhia Aérea</th>
            <th scope="col">Nome da Companhia Aérea</th>
            <th scope="col">País de Origem</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($companhias as $companhia)
            <th scope="row">{{$companhia->CD_CMPN_AEREA}}</th>
            <td>{{$companhia->NM_CMPN_AEREA}}</td>
            <td>{{$companhia->CD_PAIS}}</td>
            <td><a href="{{ route('editar-companhia', $companhia->CD_CMPN_AEREA)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-companhia', $companhia->CD_CMPN_AEREA)}}" method="post">
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