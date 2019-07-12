@include('components.header')
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Reservas</h1>
                <h2 class="text-center">Voo {{$numero}} Data {{$data}}</h2>
                <div class="col-md-6 offset-md-3">
                    <a href="{{ route('adicionar-reserva', [ 'numero' => $numero, 'data' => $data])}}"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-reserva') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($reservas as $reserva)
                    <option value="{{$reserva->CD_PSGR}}">{{$reserva->CD_PSGR}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" hidden value="{{$numero}}" name="numero" id="numero">
            <input type="text" hidden value="{{$data}}" name="data" id="data">
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
            <th scope="col">Código do Passageiro</th>
            <th scope="col">Porcentagem de Desconto</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($reservas as $reserva)
            <th scope="row">{{$reserva->CD_PSGR}}</th>
            <td>{{$reserva->PC_DESC_PASG}}</td>
            <td><a href="{{ route('editar-reserva', [ 'codigo' => $reserva->CD_PSGR, 'numero' => $numero, 'data' => $data])}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-reserva', [ 'codigo' => $reserva->CD_PSGR, 'numero' => $numero, 'data' => $data])}}" method="post">
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