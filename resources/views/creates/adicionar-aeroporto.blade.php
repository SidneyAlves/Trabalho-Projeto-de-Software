@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Adicionar Aeroporto</h1>
                
                <form action="{{ route('aeroporto.store') }}" method="post">
                @csrf
                <!-- Campo do Código -->
                <div class="form-group">
                    <label>Código do Aeroporto</label>
                    <input type="text" required maxlength="3" class="form-control" placeholder="Código do Aeroporto" id="codigo" name="codigo">
                </div>

                <!-- Campo do País -->
                <div class="form-group">
                    <label>País</label>
                    <select class="form-control adicionar-aeroporto-pais" id="pais" name="pais">
                        @foreach($paises as $pais)
                        <option value="{{$pais->CD_PAIS}}">{{$pais->CD_PAIS}} - {{$pais->NM_PAIS}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo da UF -->
                <div class="form-group">
                    <label>Unidade Federativa (Se o aeroporto estiver no Brasil)</label>
                    <select class="form-control adicionar-aeroporto-uf" id="uf" name="uf">
                        <option value="">ESTRANGEIRO</option>
                        @foreach($ufs as $uf)
                        <option value="{{$uf->SG_UF}}">{{$uf->SG_UF}} - {{$uf->NM_UF}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo da Cidade -->
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" required class="form-control" placeholder="Cidade" id="cidade" name="cidade">
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