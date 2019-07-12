@include('components.header')
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Reservas</h1>
                <h2 class="text-center">Escolha o voo para gerenciar as reservas:</h2>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-reserva-voo') }}"> 
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
            <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Visualizar">
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
            <th scope="col">Número da Rota</th>
            <th scope="col">Código da Aeronave</th>
            <th scope="col">Visualizar</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            @foreach($voos as $voo)
            <th scope="row">{{$voo->NR_VOO}}</th>
            <td>{{$voo->DT_SAIDA_VOO}}</td>
            <td>{{$voo->NR_ROTA_VOO}}</td>
            <td>{{$voo->CD_ARNV}}</td>
            <td><a href="{{ route('gerenciar-reservas-single', [ 'numero' => $voo->NR_VOO, 'data' => $voo->DT_SAIDA_VOO ] )}}"><button type="button" class="btn btn-secondary">V</button></a></td>
        </tr>
        @endforeach

        </tbody>
        </table>
        </div> 
    </div>
@include('components.footer')