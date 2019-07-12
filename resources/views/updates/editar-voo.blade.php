@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Voo</h1>
                
                <form method="post" action="{{ route('atualizar-voo', [ 'numero' => $voo->NR_VOO, 'data' => $voo->DT_SAIDA_VOO])}}">
                @method('PATCH') 
                @csrf
                <!-- Campo do Número do Voo -->
                <div class="form-group">
                    <label>Número do Voo</label>
                    <input type="text" class="form-control" required maxlength="3" placeholder="Número do Voo" id="numero" name="numero" value="{{$voo->NR_VOO}}">
                </div>

                <!-- Campo de Data de Saída -->
                <div class="form-group">
                    <label>Data de Saída</label>
                    <input type="date" class="form-control" required placeholder="Data de Saída" id="dataSaida" name="dataSaida"  value="{{$voo->DT_SAIDA_VOO}}">
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

                <form action="{{ route('deletar-voo', [ 'numero' => $voo->NR_VOO, 'data' => $voo->DT_SAIDA_VOO])}}" method="post">
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