<x-layout>
    <x-slot:heading>
        Próximas Consultas
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
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    <!-- Exemplo de Dados -->
                    <tr>
                        <td>1</td>
                        <td>20/01/2025</td>
                        <td>14:00</td>
                        <td>Dra. Maria Oliveira</td>
                        <td>Cardiologia</td>
                        <td>
                            <x-action-button href="#" color="info">Ver Mais</x-action-button>
                        </td>

                    </tr>
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>
