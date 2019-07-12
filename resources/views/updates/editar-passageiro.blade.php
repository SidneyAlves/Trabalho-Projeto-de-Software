@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Editar Passageiro</h1>
                
                <form method="post" action="{{ route('passageiros.update', $passageiro->CD_PSGR) }}">
                @method('PATCH') 
                @csrf
                
                <!-- Campo de Nome -->
                <div class="form-group">
                    <label>Nome</label>
                    <input required type="text" class="form-control" placeholder="Nome" id="nome" name="nome" value="{{$passageiro->NM_PSGR}}">
                </div>
                
                <!-- Campo de Sexualidade, é um Select pra manter o padrão com os Inserts enviado pelo professor -->
                <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" id="sexo" name="sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>

                <!-- Campo de Data de Nascimento -->
                <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" required class="form-control" placeholder="Data de Nascimento" id="dataNasc" name="dataNasc" value="{{$passageiro->DT_NASC_PSGR}}">
                </div>

                <!-- Campo de Nacionalidade, terá uma consulta a tabela ITR_PAIS pra preencher o select -->
                <div class="form-group">
                    <label>País de Origem</label>
                    <select class="form-control adicionar-passageiro-responsavel" id="pais" name="pais">
                    @foreach($paises as $pais)
                    <option value="{{$pais->CD_PAIS}}">{{$pais->CD_PAIS}} - {{$pais->NM_PAIS}}</option>
                    @endforeach
                    </select>
                </div>

                <!-- Campo de Estado Civil -->
                <div class="form-group">
                    <label>Estado Civil</label>
                    <select class="form-control" id="estCivil" name="estCivil">
                        <option value="S">Solteiro</option>
                        <option value="C">Casado</option>
                    </select>
                </div>

                <hr >

                <!-- Campo de Responsável, caso exista, irá entrar os dados dos passageiros -->
                <div class="form-group">
                    <label>Responsável, caso exista</label>
                    <select class="form-control adicionar-passageiro-responsavel" id="responsavel" name="responsavel">
                        <option value="">Nenhum</option>
                        @foreach($passageiros as $passageiro)
                        <option value="{{$passageiro->CD_PSGR}}">{{$passageiro->CD_PSGR}} - {{$passageiro->NM_PSGR}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar">
                </form>

                <form action="{{ route('deletar-passageiro', $passageiro->CD_PSGR)}}" method="post">
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