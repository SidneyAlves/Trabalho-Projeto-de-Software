@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Gerenciar Passageiros</h1>
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-passageiro"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-passageiro') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($passageiros as $passageiro)
                    <option value="{{$passageiro->CD_PSGR}}">{{$passageiro->CD_PSGR}} - {{$passageiro->NM_PSGR}}</option>
                    @endforeach
                </select>
            </div>
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
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Nacionalidade</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Código do Responsável</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($passageiros as $passageiro)
            <th scope="row">{{$passageiro->CD_PSGR}}</th>
            <td>{{$passageiro->NM_PSGR}}</td>
            <td>{{$passageiro->IC_SEXO_PSGR}}</td>
            <td>{{$passageiro->DT_NASC_PSGR}}</td>
            <td>{{$passageiro->CD_PAIS}}</td>
            <td>{{$passageiro->IC_ESTD_CIVIL}}</td>
            <td>{{$passageiro->CD_PSGR_RESP}}</td>
            <td><a href="{{ route('editar-passageiro', $passageiro->CD_PSGR)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-passageiro', $passageiro->CD_PSGR)}}" method="post">
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