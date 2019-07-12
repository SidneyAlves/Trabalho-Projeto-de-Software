@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Rota de Voo</h1>
                
                <form method="post" action="{{ route('rota.update', $rota->NR_ROTA_VOO) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo do Aeroporto de Origem -->
                <div class="form-group">
                    <label>Aeroporto de Origem</label>
                    <select class="form-control adicionar-rota-aeroportoO" id="aeroportoO" name="aeroportoO">
                        @foreach($aeroportos as $aeroporto)
                        <option value="{{$aeroporto->CD_ARPT}}">{{$aeroporto->CD_ARPT}} - {{$aeroporto->CD_PAIS}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo do Aeroporto de Destino -->
                <div class="form-group">
                    <label>Aeroporto de Destino</label>
                    <select class="form-control adicionar-rota-aeroportoD" id="aeroportoD" name="aeroportoD">
                    @foreach($aeroportos as $aeroporto)
                        <option value="{{$aeroporto->CD_ARPT}}">{{$aeroporto->CD_ARPT}} - {{$aeroporto->CD_PAIS}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo do Voucher -->
                <div class="form-group">
                    <label>Voucher</label>
                    <input type="number" required class="form-control" placeholder="Voucher" id="voucher" name="voucher" min="0" max="100000" step="1" value="{{$rota->VR_PASG}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-rota', $rota->NR_ROTA_VOO)}}" method="post">
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