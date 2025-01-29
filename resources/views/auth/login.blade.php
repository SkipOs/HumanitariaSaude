<x-clear-page>
    <x-form class="card card-md" action="/login" method="post">
        <x-slot:title>Realizar login</x-slot:title>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name='cpf' id='cpf' class="form-control maska" data-maska="###.###.###-##" data-mask-visible="true" placeholder="000.000.000-00" autocomplete="off" required>CPF</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control" placeholder="••••••••" required>Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext>Primeira vez? <a href="/register">Faça seu Cadastro</a> na plataforma.</x-slot:bottomtext>
    </x-form>
</x-clear-page>
