<x-layout>
    <x-slot:heading>
        Perfil
    </x-slot:heading>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 flex-column">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="avatar avatar-xl"
                                style="background-image: url(./static/avatars/000m.jpg)">M</span>
                        </div>
                        <div class="row align-items-middle col-auto">
                            <h2 class="mb-2">Minha Conta</h2>
                        </div>
                    </div>

                    <h3 class="card-title mt-4">Detalhes do Perfil</h3>
                    <x-input tabler="col-md" type="text" class="form-control" value="Tabler">Nome do
                        Usuário</x-input>
                    <x-input tabler="col-md" type="nome" class="form-control"
                        placeholder="Insira o seu Nome">Nome</x-input>

                    <x-input tabler="col-md" type="text" class="form-control" value="Tabler">Informações</x-input>
                    <div class="row g-3">
                        <x-input tabler="mb-3" type="cpf" class="form-control"
                            placeholder="Insira o CPF">CPF</x-input>
                        <x-input tabler="mb-3" type="email" class="form-control" placeholder="__ /__ /____">Data de
                            Nascimento</x-input>
                    </div>

                    <div class="row g-3">
                        <x-input tabler="mb-3" type="endereco" class="form-control"
                            placeholder="Cidade, Estado">Endereço</x-input>
                        <x-button>Alterar</x-button>
                    </div>
                    <div class="row g-3">
                        <x-input tabler="mb-3" type="telefone" class="form-control"
                            placeholder="Digite seu Telefone">Telefone</x-input>
                        <x-button>Alterar</x-button>

                    </div>


                    <h3 class="card-title mt-4">Segurança</h3>
                    <p class="card-subtitle">Você pode trocar sua senha clicando no botão</p>
                    <x-button>Trocar a senha</x-button>
                </div>

                <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        <a href="#" class="btn">
                            Cancelar
                        </a>
                        <a href="#" class="btn btn-primary">
                            Salvar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
