<x-clear-page>

    <x-slot:link>href="/home"</x-slot:link>
    <x-slot:linkname>Voltar</x-slot:linkname>

    <x-form class="card card-md" action="/psaude/profissional" method="post">
        <x-slot:title>Profissional De Saúde</x-slot:title>

        <!-- Exibindo mensagens de sucesso ou erro -->
        <x-alert-message></x-alert-message>

        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name='email' id='email' class="form-control"  placeholder="Insira seu email" autocomplete="off" required>Email</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control"
            placeholder="••••••••">Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>
    </x-form>
</x-clear-page>
