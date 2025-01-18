<x-clear-page>
    <x-form class="card card-mb" action="/register" method="post">
        <x-slot:title>Cadastro</x-slot:title>
        <x-input tabler="mb-3" type="nome" class="form-control" placeholder="Insira o seu Nome">Nome</x-input>
        <x-input tabler="mb-3" type="cpf" class="form-control" placeholder="Insira o CPF">CPF</x-input>
        <x-input tabler="mb-3" type="email" class="form-control" placeholder="__ /__ /____">Data de Nascimento</x-input>
        <x-input tabler="mb-3" type="endereco" class="form-control" placeholder="Cidade, Estado">Endereço</x-input>
        <x-input tabler="mb-3" type="telefone" class="form-control" placeholder="Digite seu Telefone">Telefone</x-input>
        <x-input tabler="mb-3" type="password" class="form-control" placeholder="Senha">Senha</x-input>
        <x-input tabler="mb-3" type="password" class="form-control" placeholder="Senha">Confirme sua senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Registrar-se</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>

    </x-form>
</x-clear-page>
