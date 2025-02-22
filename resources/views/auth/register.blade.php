<x-clear-page>
    <x-form class="card card-mb" action="/register" method="POST">
        <x-slot:title>Cadastro</x-slot:title>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <x-input tabler="mb-3" name="nome" type="text" class="form-control" placeholder="Insira o seu Nome" required>Nome</x-input>
        <x-input tabler="mb-3" name="cpf" type="text" class="form-control maska" data-maska="###.###.###-##" placeholder="Insira o CPF" required>CPF</x-input>
        <x-input tabler="mb-3" name="dataNascimento" type="date" class="form-control timedate" placeholder="__ /__ /____" required>Data de Nascimento</x-input>
        <x-input tabler="mb-3" name="endereco" type="text" class="form-control" placeholder="Cidade, Estado" >Endereço</x-input>
        <x-input tabler="mb-3" name="telefone" type="text" class="form-control maska" data-maska="(##) #####-####" placeholder="Digite seu Telefone" >Telefone</x-input>
        <x-input tabler="mb-3" name="senha" type="password" class="form-control" placeholder="Senha" required>Senha</x-input>
        <x-input tabler="mb-3" name='senha_confirmation' type="password" class="form-control" placeholder="Senha" required>Confirme sua senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Registrar-se</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>

    </x-form>
</x-clear-page>
