@include('components.header')
    
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Gerenciar Aeronaves</h1>
                
                <div class="col-md-6 offset-md-3">
                    <a href="adicionar-aeronave"><button type="button" class="btn btn-primary btn-lg btn-block" style="margin-bottom:20px">Adicionar</button></a>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('filtrar-aeronave') }}"> 
        @csrf
        <div class="container">
            
            <div class="form-group">
                <label>Pesquisa</label>
                <select class="form-control adicionar-passageiro-responsavel" id="pesquisa" name="pesquisa">
                    @foreach($aeronaves as $aeronave)
                    <option value="{{$aeronave->CD_ARNV}}">{{$aeronave->CD_ARNV}}</option>
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
            <th scope="col">Código da Aeronave</th>
            <th scope="col">Código do Equipamento</th>
            <th scope="col">Código da Companhia Aérea</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        @foreach($aeronaves as $aeronave)
            <th scope="row">{{$aeronave->CD_ARNV}}</th>
            <td>{{$aeronave->CD_EQPT}}</td>
            <td>{{$aeronave->CD_CMPN_AEREA}}</td>
            <td><a href="{{ route('editar-aeronave', $aeronave->CD_ARNV)}}"><button type="button" class="btn btn-info">E</button></a></td>
            <td><form action="{{ route('deletar-aeronave', $aeronave->CD_ARNV)}}" method="post">
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