@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Equipamento</h1>
                
                <form method="post" action="{{ route('equipamento.update', $equipamento->CD_EQPT) }}">
                @method('PATCH') 
                @csrf
                <!-- Campo de Código -->
                <div class="form-group">
                    <label>Código</label>
                    <input type="text" maxlength="3" class="form-control" placeholder="Código" id="codigo" name="codigo" value="{{$equipamento->CD_EQPT}}" required>
                </div>
                
                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome"  value="{{$equipamento->NM_EQPT}}" required>
                </div>

                <!-- Campo de Descrição -->
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required> {{$equipamento->CD_EQPT}}</textarea>
                </div>

                <!-- Campo de quantidade de motores -->
                <div class="form-group">
                    <label>Quantidade de Motores</label>
                    <input type="number" class="form-control" placeholder="Qntd de Motores" id="motores" name="motores" min="0" max="10" step="1" required  value="{{$equipamento->QT_MOTOR}}">
                </div>

                <!-- Campo de Tipo de Propulsor -->
                <div class="form-group">
                    <label>Tipo de Propulsor</label>
                    <input type="text" class="form-control" maxlength="1" placeholder="Tipo de Propulsor" id="propulsor" name="propulsor" required value="{{$equipamento->IC_TIPO_PRPS}}">
                </div>

                <!-- Campo de quantidade de passageiros -->
                <div class="form-group">
                    <label>Quantidade de Passageiros</label>
                    <input type="number" class="form-control" placeholder="Qntd de Passageiros" id="passageiros" required name="passageiros" min="0" max="1000" step="1" value="{{$equipamento->QT_PSGR}}">
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-equipamento', $equipamento->CD_EQPT)}}" method="post">
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