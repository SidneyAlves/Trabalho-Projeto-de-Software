@include('components.header')
    
    <div class="container-fluid">
        <div class="container text-center">
            <h1>Sobre</h1>
            <p>Este é um trabalho de Projeto de Software, feito pelo aluno Sidney Sampaio Alves, matrícula 201739028-1, na Universidade Federal Rural do Rio de Janeiro.</p>
            <p>O Sistema foi desenvolvido em Laravel, HTML/CSS, Um tema de Boostrap chamado <a href="https://bootswatch.com/solar/" target="_blank">Solar</a>, JQuery e <a href="https://select2.org/" target="_blank">Select2</a>, uma pequena biblioteca para auxiliar na utilização dos select boxes, visto que selecionar a linha desejada pode ser bem complicado se o banco estiver bem populado.</p>
            <p><strong>Tema: </strong>Desenvolvimento de um sistema de reserva e controle de viagens aéreas.</p>
            <p><strong>Descrição Geral: </strong> O projeto consiste em criar um sistema web para o gerenciamento e controle de viagens aéreas, com funcionalidades que vão desde o cadastro e controle de equipamentos de uma aeronave, até o cadastro e controle de passageiros e viagens.
            O sistema terá dois tipos de usuários: O gestor e o vendedor, ambos são funcionários, porém, o gestor terá acesso total ao sistema, enquanto o vendedor só irá ter contato com a parte de passageiros e reservas, já que terá contato direto com o público. O gestor por ter controle total, será responsável por funções como controle das aeronaves, rotas, aeroportos, viagens, entre outros. 
            </p>
            <p><strong>Problema/Necessidade: </strong>Necessidade de reservar passagens aéreas para passageiros.
            Necessidade de gerenciar equipamentos, aviões, rotas, aeroportos, entre outros.
            </p>
            <p><strong>Solução Desejada: </strong>Desenvolvimento de um Sistema Web, focado na gerência de recursos da agência de viagens e reserva de passagens aéreas.</p>
            <p>Outras informações pertinentes ao projeto estarão junto do sistema.</p>
        </div>
    </div>

    @include('components.footer')