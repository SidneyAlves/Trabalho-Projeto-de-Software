@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar Aeronave</h1>
                
                <form action="{{ route('aeronave.store') }}" method="post">
                @csrf
                <!-- Campo de Código -->
                <div class="form-group">
                    <label>Código da Aeronave</label>
                    <input type="text" required maxlength="8" class="form-control" placeholder="Código" id="codigo" name="codigo">
                </div>

                <!-- Campo de Código do Equipamento -->
                <div class="form-group">
                    <label>Escolha o Equipamento</label>
                    <select class="form-control adicionar-aeronave-equipamento" id="equipamento" name="equipamento">
                        @foreach($equipamentos as $equipamento)
                        <option value="{{$equipamento->CD_EQPT}}">{{$equipamento->CD_EQPT}} - {{$equipamento->NM_EQPT}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo de Código da Companhia Aérea -->
                <div class="form-group">
                    <label>Escolha a Companhia Aérea</label>
                    <select class="form-control adicionar-aeronave-companhia" id="companhia" name="companhia">
                        @foreach($companhias as $companhia)
                        <option value="{{$companhia->CD_CMPN_AEREA}}">{{$companhia->CD_CMPN_AEREA}} - {{$companhia->NM_CMPN_AEREA}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                @if (session()->get('success'))
                    <div class="alert alert-success py-2">
                        {{session()->get('success')}}.
                    </div>
                @endif

            </div>
        </div>

    </div>    

@include('components.footer')