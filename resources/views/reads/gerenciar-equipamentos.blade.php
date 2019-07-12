@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Equipamentos</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-equipamento"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-equipamento') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->CD_EQPT}}">{{$equipamento->CD_EQPT}} - {{$equipamento->NM_EQPT}}</option>
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
            <th scope="col">Código do Equipamento</th>
            <th scope="col">Nome do Equipamento</th>
            <th scope="col">Descrição do Tipo do Equipamento</th>
            <th scope="col">Quantidade de Motores</th>
            <th scope="col">Tipo de Propulsor</th>
            <th scope="col">Quantidade de Passageiros</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($equipamentos as $equipamento)
            <th scope="row">{{$equipamento->CD_EQPT}}</th>
            <td>{{$equipamento->NM_EQPT}}</td>
            <td>{{$equipamento->DC_TIPO_EQPT}}</td>
            <td>{{$equipamento->QT_MOTOR}}</td>
            <td>{{$equipamento->IC_TIPO_PRPS}}</td>
            <td>{{$equipamento->QT_PSGR}}</td>
            <td><a href="{{ route('editar-equipamento', $equipamento->CD_EQPT)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-equipamento', $equipamento->CD_EQPT)}}" method="post">
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