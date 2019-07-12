@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Rotas de Voos</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-rota"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-rota') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($rotas as $rota)
                    <option value="{{$rota->NR_ROTA_VOO}}">{{$rota->NR_ROTA_VOO}}</option>
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
            <th scope="col">Id da Rota</th>
            <th scope="col">Aeroporto de Origem</th>
            <th scope="col">Aeroporto de Destino</th>
            <th scope="col">Voucher da Passagem</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($rotas as $rota)
            <th scope="row">{{$rota->NR_ROTA_VOO}}</th>
            <td>{{$rota->CD_ARPT_ORIG}}</td>
            <td>{{$rota->CD_ARPT_DESC}}</td>
            <td>{{$rota->VR_PASG}}</td>
            <td><a href="{{ route('editar-rota', $rota->NR_ROTA_VOO)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-rota', $rota->NR_ROTA_VOO)}}" method="post">
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