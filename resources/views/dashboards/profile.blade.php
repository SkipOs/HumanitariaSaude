@php
    use Carbon\Carbon;
    // Obtém o usuário autenticado
    $user = Auth::user();
@endphp



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
                                style="background-image: url(./static/avatars/000m.jpg)">{{ $user->nome[0] }}</span>
                        </div>
                        <div class="col">
                            <h2 class="mb-0">Minha Conta</h2>
                        </div>
                    </div>

                    <!-- Detalhes do Perfil -->
                    <h3 class="card-title">Detalhes do Perfil</h3>
                    <x-input type="text" class="form-control" value="{{ $user->nome }}" readonly>Nome</x-input>

                    @if (Auth::user()->tipo == 'paciente')
                        <!-- Informações Gerais -->
                        <h3 class="card-title mt-4">Informações Gerais</h3>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control maska"
                                    data-maska="['###.###.###-##', '##.###.###/####-##']"
                                    value="{{ $user->paciente->cpf }}" readonly>CPF</x-input>
                            </div>
                            <div class="col-md-4">
                                <x-input type="date" class="form-control"
                                    value="{{ Carbon::parse($user->paciente->dataNascimento)->format('Y-m-d') }}"
                                    readonly>Data de Nascimento</x-input>
                            </div>
                        </div>
                        <div class="row g-2 mt-2" style="align-items: flex-end;">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control" value="{{ $user->paciente->endereco }}"
                                    readonly>Endereço</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                            <div class="col-md-4">
                                <x-input type="tel" class="form-control" data-maska="(##) #####-####"
                                    value="{{ $user->paciente->telefone }}" readonly>Telefone</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                        </div>
                    @endif


                    @if (Auth::user()->tipo == 'profissionalSaude')
                        <!-- Informações Gerais -->
                        <h3 class="card-title mt-4">Informações Gerais</h3>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control" value="{{ $user->profissionalSaude->crm }}"
                                    readonly>CRM</x-input>
                            </div>
                            <div class="col-md-4">
                                <x-input type="date" class="form-control" value="" readonly>Data de
                                    Nascimento</x-input>
                            </div>
                        </div>
                        <div class="row g-2 mt-2" style="align-items: flex-end;">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control" value="" readonly>Endereço</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                            <div class="col-md-4">
                                <x-input type="tel" class="form-control" value="" data-maska="(##) #####-####"
                                    readonly>Telefone</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                        </div>
                    @endif


                    @if (Auth::user()->tipo == 'administrador')
                        <!-- Informações Gerais -->
                        <h3 class="card-title mt-4">Informações Gerais</h3>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control" data-maska="###.###.###-##" value=""
                                    readonly>CPF</x-input>
                            </div>
                            <div class="col-md-4">
                                <x-input type="date" class="form-control" value="" readonly>Data de
                                    Nascimento</x-input>
                            </div>
                        </div>
                        <div class="row g-2 mt-2" style="align-items: flex-end;">
                            <div class="col-md-4">
                                <x-input type="text" class="form-control" value="" readonly>Endereço</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                            <div class="col-md-4">
                                <x-input type="tel" class="form-control" data-maska="(##) #####-####"
                                    value="{{ $user->administrador->telefone }}" readonly>Telefone</x-input>
                                <!-- <x-button class="btn">Alterar</x-button>-->
                            </div>
                        </div>
                    @endif

                    <!-- Segurança
                        <h3 class="card-title mt-4">Segurança</h3>
                        <p class="card-subtitle">Você pode trocar sua senha clicando no botão abaixo.</p>
                        <x-button class="btn">Trocar a senha</x-button>-->
                </div>

                <!-- Rodapé do Cartão
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn">Cancelar</a>
                            <a href="#" class="btn btn-primary">Salvar</a>
                        </div>
                    </div>-->
            </div>
        </div>
    </div>

</x-layout>
