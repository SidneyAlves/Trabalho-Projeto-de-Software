@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Reserva</h1>
                
                <form method="post" action="{{ route('reservas.update', [ 'codigo' => $reserva->CD_PSGR, 'numero' => $numero, 'data' => $data]) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo de Selecionar o Código do Passageiro, será exibido todos os nomes dos passageiros-->
                <div class="form-group">
                    <label>Passageiro</label>
                    <select class="form-control adicionar-reserva-passageiro" id="passageiro" name="passageiro">
                    @foreach($passageiros as $passageiro)
                    <option value="{{$passageiro->CD_PSGR}}">{{$passageiro->CD_PSGR}} - {{$passageiro->NM_PSGR}}</option>
                    @endforeach
                    </select>
                </div>
                
                <!-- Campo de % de desconto -->
                <div class="form-group">
                    <label>Desconto</label>
                    <input type="number" required class="form-control" placeholder="% de desconto" id="desconto" name="desconto" min="0" max="100" step="1" value="{{$reserva->PC_DESC_PASG}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-reserva', [ 'codigo' => $reserva->CD_PSGR, 'numero' => $numero, 'data' => $data])}}" method="post">
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