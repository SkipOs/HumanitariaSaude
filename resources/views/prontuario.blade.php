@php
    $idPaciente = 1;
@endphp

<x-layout>
    <x-slot:heading>
        Consultar Prontuário
    </x-slot:heading>

    <x-form class="card card-mb" action="#" method="get">
        <x-slot:title>Buscar Prontuário</x-slot:title>
        <x-input type="text" value="" class="form-control" placeholder="Insira o id do Prontuário..."/>

        <x-slot:actions>
            <x-button type="submit" class="btn btn-primary">Buscar</x-button>
        </x-slot:actions>

        <x-slot:bottomtext></x-slot:bottomtext>

    </x-form>
</x-layout>
