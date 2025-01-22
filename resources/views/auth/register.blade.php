<x-clear-page>
    <x-form class="card card-mb" action="/register" method="POST">
        <x-slot:title>Cadastro</x-slot:title>
        @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-input tabler="mb-3" name="nome" type="text" class="form-control" placeholder="Insira o seu Nome">Nome</x-input>
        <x-input tabler="mb-3" name="cpf" type="text" class="form-control" placeholder="Insira o CPF">CPF</x-input>
        <x-input tabler="mb-3" name="dataNascimento" type="date" class="form-control" placeholder="__ /__ /____">Data de Nascimento</x-input>
        <x-input tabler="mb-3" name="endereco" type="text" class="form-control" placeholder="Cidade, Estado">Endereço</x-input>
        <x-input tabler="mb-3" name="telefone" type="text" class="form-control" placeholder="Digite seu Telefone">Telefone</x-input>
        <x-input tabler="mb-3" name="senha" type="password" class="form-control" placeholder="Senha">Senha</x-input>
        <x-input tabler="mb-3" name='senha_confirmation' type="password" class="form-control" placeholder="Senha">Confirme sua senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Registrar-se</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>

    </x-form>
</x-clear-page>
