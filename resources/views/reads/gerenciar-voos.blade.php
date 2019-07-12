@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Voos</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-voo"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-voo') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <h2>Pesquisa</h2>
                <label>Número do voo</label>
                <select class="form-control adicionar-passageiro-responsavel" id="numero" name="numero">
                    @foreach($voos as $voo)
                    <option value="{{$voo->NR_VOO}}">{{$voo->NR_VOO}}</option>
                    @endforeach
                </select>
                <label>Data de Saída</label>
                <select class="form-control adicionar-passageiro-responsavel" id="data" name="data">
                    @foreach($voos as $voo)
                    <option value="{{$voo->DT_SAIDA_VOO}}">{{$voo->DT_SAIDA_VOO}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-info btn-lg btn-block" value="Editar">
            @if (session()->get('error'))
            <hr>
                <div class="alert alert-danger py-2">
                    {{session()->get('error')}}.
                </div>
            @endif
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
            <th scope="col">Número do Voo</th>
            <th scope="col">Data de Saída</th>
            <th scope="col">Rota do Voo</th>
            <th scope="col">Aeronave</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($voos as $voo)
            <th scope="row">{{$voo->NR_VOO}}</th>
            <td>{{$voo->DT_SAIDA_VOO}}</td>
            <td>{{$voo->NR_ROTA_VOO}}</td>
            <td>{{$voo->CD_ARNV}}</td>
            <td><a href="{{ route('editar-voo', [ 'numero' => $voo->NR_VOO, 'data' => $voo->DT_SAIDA_VOO])}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-voo', [ 'numero' => $voo->NR_VOO, 'data' => $voo->DT_SAIDA_VOO])}}" method="post">
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