@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar Reserva</h1>
                
                <form action="{{ route('reservas.store') }}" method="post">
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
                    <input type="number" required class="form-control" placeholder="% de desconto" id="desconto" name="desconto" min="0" max="100" step="1">
                    <input  id="numero" name="numero" hidden value="{{$numero}}">
                    <input  name="data" hidden value="{{$data}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

            </div>
        </div>

    </div>    

@include('components.footer')