@include('components.header')

    <div class="container-fluid">
        <div class="container">

            <!-- Início de uma Linha -->
            <div class="row"  style="margin-top:20px">
                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Equipamentos</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Equipamentos</p>
                            <a href="gerenciar-equipamentos"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Aeronaves</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Aeronaves</p>
                            <a href="gerenciar-aeronaves"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Companhias Aéreas</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Comnpanhias Aéreas</p>
                            <a href="gerenciar-companhias"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Voos</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Voos</p>
                            <a href="gerenciar-voos"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Final de uma Linha -->

            <!-- Início de uma Linha -->
            <div class="row">
                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Países</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Países</p>
                            <a href="gerenciar-paises"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Rotas de Voos</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Rotas de Voos</p>
                            <a href="gerenciar-rotas"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">Aeroportos</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Aeroportos</p>
                            <a href="gerenciar-aeroportos"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                        <div class="card-header">Controle</div>
                        <div class="card-body">
                            <h4 class="card-title">UFs</h4>
                            <p class="card-text">Adicionar, Visualizar, Editar e Remover Unidades Federativas</p>
                            <a href="gerenciar-ufs"><button class="btn btn-primary btn-block">Acessar</button></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Final de uma Linha -->

        </div>
    </div>

    @include('components.footer')