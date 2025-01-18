<x-layout>
    <x-slot:heading>
        Histórico de Consultas
    </x-slot:heading>

    <div class="container mt-4">
        <div class="card">
        <x-table>
            <x-slot:headers>
                <th>#</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Detalhes</th>
            </x-slot:headers>
            <x-slot:rows>
                <!-- Exemplo de Dados -->
                <tr>
                    <td>1</td>
                    <td>15/01/2025</td>
                    <td>11:00</td>
                    <td>Dr. Carlos Lima</td>
                    <td>Ortopedia</td>
                    <td>
                        <x-action-button href="#" color="info">Ver Mais</x-action-button>
                    </td>
                </tr>
            </x-slot:rows>
        </x-table>
        </div>
    </div>
</x-layout>
