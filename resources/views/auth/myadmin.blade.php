<x-clear-page>
    <x-form class="card card-md" action="/myadmin/admin" method="post">
        <x-slot:title>Admin</x-slot:title>

        @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name='telefone' id='telefone' class="form-control" data-mask="000.000.000-00" data-mask-visible="true" placeholder="000.000.000-00" autocomplete="off">Telefone</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control" placeholder="••••••••">Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext> </x-slot:bottomtext>
    </x-form>

    <x-form class="card card-md" action="/myadmin/profissional" method="post">
        <x-slot:title>Profissional De Saúde</x-slot:title>

        @if ($errors->any())
        <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script src="https://unpkg.com/imask"></script>

        <x-input type="text" name='crm' id='crm' class="form-control" data-mask="000.000.000-00" data-mask-visible="true" placeholder="000.000.000-00" autocomplete="off">CRM</x-input>

        <x-input type="password" name='senha' id='senha' class="form-control" placeholder="••••••••">Senha</x-input>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Login</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>
    </x-form>
</x-clear-page>
