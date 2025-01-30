<x-clear-page>
    <x-form class="card card-md" action="/psaude/profissional" method="post">
        <x-slot:title>Profissional De Saúde</x-slot:title>

        <!-- Exibindo mensagens de sucesso ou erro -->
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

        <x-input type="text" name='crm' id='crm' class="form-control" placeholder="" autocomplete="off">CRM</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control"
            placeholder="••••••••">Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>
    </x-form>
</x-clear-page>
