<x-layout>
    <x-slot:heading>
        Consultas Agendadas
    </x-slot:heading>

    <div class="container mt-4">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>#</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    <!-- Exemplo de Dados -->
                    <tr>
                        <td>1</td>
                        <td>21/01/2025</td>
                        <td>10:00</td>
                        <td>José Santos</td>
                        <td>
                            <x-action-button href="#" color="info">Ver Detalhes</x-action-button>
                            <x-action-button href="#" color="success">Concluir</x-action-button>
                        </td>
                    </tr>
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>
