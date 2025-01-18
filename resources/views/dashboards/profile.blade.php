<x-layout>
    <x-slot:heading>
        Perfil
    </x-slot:heading>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 d-flex flex-column">
                <div class="card-body">
                    <!-- Cabeçalho do Perfil -->
                    <div class="row align-items-center mb-4">
                        <div class="col-auto">
                            <span class="avatar avatar-xl"
                                style="background-image: url(./static/avatars/000m.jpg)">M</span>
                        </div>
                        <div class="col">
                            <h2 class="mb-0">Minha Conta</h2>
                        </div>
                    </div>

                    <!-- Detalhes do Perfil -->
                    <h3 class="card-title">Detalhes do Perfil</h3>
                    <x-input type="text" class="form-control" placeholder="Insira o seu Nome">Nome</x-input>

                    <!-- Informações Gerais -->
                    <h3 class="card-title mt-4">Informações Gerais</h3>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <x-input type="text" class="form-control" placeholder="Insira o CPF">CPF</x-input>
                        </div>
                        <div class="col-md-4">
                            <x-input type="date" class="form-control">Data de Nascimento</x-input>
                        </div>
                    </div>
                    <div class="row g-2 mt-2" style="align-items: flex-end;">
                        <div class="col-md-4">
                            <x-input type="text" class="form-control" placeholder="Cidade, Estado">Endereço</x-input>
                            <x-button class="btn">Alterar</x-button>
                        </div>
                        <div class="col-md-4">
                            <x-input type="tel" class="form-control"
                                placeholder="Digite seu Telefone">Telefone</x-input>
                            <x-button class="btn alig">Alterar</x-button>
                        </div>
                    </div>

                    <!-- Segurança -->
                    <h3 class="card-title mt-4">Segurança</h3>
                    <p class="card-subtitle">Você pode trocar sua senha clicando no botão abaixo.</p>
                    <x-button class="btn">Trocar a senha</x-button>
                </div>

                <!-- Rodapé do Cartão -->
                <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        <a href="#" class="btn">Cancelar</a>
                        <a href="#" class="btn btn-primary">Salvar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
