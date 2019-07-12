@include('components.header')

    <div class="container-fluid">
        <div class="container">
        @if (session()->get('error'))
        <hr>
            <div class="alert alert-danger py-2">
                {{session()->get('error')}}.
            </div>
        @endif
            <h2 class="text-center">Seja bem vindo ao Sistema de Controle de Viagens Aéreas</h2>
            <p>Aqui você poderá:</p>
            <ul>
                <li>Adicionar, Visualizar, Editar e Remover Passageiros;</li>
                <li>Adicionar, Visualizar, Editar e Remover Reservas de Viagens;</li>
                <li>Visualizar Voos.</li>
            </ul>

            <p>E caso tenha acesso a parte de controle interno, além de todas as funcionalidades já citadas, também poderá:</p>
                <li>Adicionar, Editar e Remover Voos</li>
                <li>Adicionar, Editar, Visualizar e Remover Equipamentos</li>
                <li>Adicionar, Editar, Visualizar e Remover Aeronaves</li>
                <li>Adicionar, Editar, Visualizar e Remover Companhias Aéreas</li>
                <li>Adicionar, Editar, Visualizar e Remover Países</li>
                <li>Adicionar, Editar, Visualizar e Remover Rotas de Voos</li>
                <li>Adicionar, Editar, Visualizar e Remover Aeroportos</li>
                <li>Adicionar, Editar, Visualizar e Remover Unidades Federativas</li>

            <p>Lembre-se que somente pessoas autorizadas podem acessar o controle interno do sistema, e por isso, será necessário digitar a senha padrão de acesso.</p>
        </div>
    </div>

    @include('components.footer')