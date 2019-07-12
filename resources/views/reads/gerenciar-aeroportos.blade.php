@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Aeroportos</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-aeroporto"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>
    
        <form method="post" action="{{ route('filtrar-aeroporto') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($aeroportos as $aeroporto)
                    <option value="{{$aeroporto->CD_ARPT}}">{{$aeroporto->CD_ARPT}} - {{$aeroporto->NM_CIDD}}</option>
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
            <th scope="col">Código do Aeroporto</th>
            <th scope="col">País</th>
            <th scope="col">Unidade Federativa</th>
            <th scope="col">Nome da Cidade</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($aeroportos as $aeroporto)
            <th scope="row">{{$aeroporto->CD_ARPT}}</th>
            <td>{{$aeroporto->CD_PAIS}}</td>
            <td>{{$aeroporto->SG_UF}}</td>
            <td>{{$aeroporto->NM_CIDD}}</td>
            <td><a href="{{ route('editar-aeroporto', $aeroporto->CD_ARPT)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-aeroporto', $aeroporto->CD_ARPT)}}" method="post">
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