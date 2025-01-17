<x-clear-page>
    <x-form class="card card-md" action="/login" method="post">    
        <x-slot:title>Realizar login</x-slot:title>
        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name="cpf" class="form-control" data-mask="000.000.000-00" data-mask-visible="true" placeholder="000.000.000-00" autocomplete="off">Senha</x-input>

        <x-input type="password" class="form-control" placeholder="••••••••">Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>          
        </x-slot:actions>

        <x-slot:bottomtext>Primeira vez? <a href="/register">Faça seu Cadastro</a> na plataforma.</x-slot:bottomtext>
    </x-form>
</x-clear-page>
