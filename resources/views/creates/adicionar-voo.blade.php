@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar Voo</h1>
                
                <form action="{{ route('voos.store') }}" method="post">
                @csrf
                <!-- Campo do Número do Voo -->
                <div class="form-group">
                    <label>Número do Voo</label>
                    <input type="text" required maxlength="3" class="form-control" placeholder="Número do Voo" id="numero" name="numero">
                </div>

                <!-- Campo de Data de Saída -->
                <div class="form-group">
                    <label>Data de Saída</label>
                    <input type="date" required class="form-control" placeholder="Data de Saída" id="dataSaida" name="dataSaida">
                </div>

                <!-- Campo do Numero da Rota -->
                <div class="form-group">
                    <label>Rota do Voo</label>
                    <select class="form-control adicionar-voo-rota" id="rota" name="rota">
                    @foreach($rotas as $rota)
                    <option value="{{$rota->NR_ROTA_VOO}}">{{$rota->NR_ROTA_VOO}}</option>
                    @endforeach
                    </select>
                </div>

                <!-- Campo da Aeronave -->
                <div class="form-group">
                    <label>Aeronave</label>
                    <select class="form-control adicionar-voo-aeronave" id="aeronave" name="aeronave">
                    @foreach($aeronaves as $aeronave)
                    <option value="{{$aeronave->CD_ARNV}}">{{$aeronave->CD_ARNV}}</option>
                    @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

            </div>
        </div>

    </div>    

@include('components.footer')