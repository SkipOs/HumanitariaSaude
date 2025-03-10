<x-clear-page>

    <x-slot:link>href="/home"</x-slot:link>
    <x-slot:linkname>Voltar</x-slot:linkname>
    <x-form class="card card-md" action="/login" method="post">
        <x-slot:title>Realizar login</x-slot:title>

        <x-alert-message></x-alert-message>

        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name='email' id='email' class="form-control"  placeholder="Insira seu email" autocomplete="off" required>Email</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control" placeholder="••••••••" required>Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext>Primeira vez? <a href="/register">Faça seu Cadastro</a> na plataforma.</x-slot:bottomtext>
    </x-form>
</x-clear-page>
