<x-layout>
    <x-slot:heading>
        Exames Pendentes
    </x-slot:heading>

    <div class="container mt-4">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    <!-- Exemplo de Dados -->
                    <tr>
                        <td>1</td>
                        <td>Hemograma</td>
                        <td>22/01/2025</td>
                        <td>09:00</td>
                        <td>
                            <x-action-button href="" color="info">Ver Detalhes</x-action-button>
                        </td>
                    </tr>
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>
