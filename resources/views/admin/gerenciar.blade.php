<x-layout>
    <x-slot:heading>
        Gerenciar {{ $tableName }}
    </x-slot:heading>

    <div class="container">
        <!-- Botão para Adicionar Novo -->
        <div class="mb-3 text-end">
            <a href="#" class="btn btn-primary">Adicionar Novo</a>
        </div>

        <!-- Tabela -->
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>Dados</th>
                    <th>Ações</th>
                </x-slot:headers>

                <x-slot:rows>
                    @foreach ($data as $row)
                        <tr>
                            <td>
                                @foreach ($row as $key => $value)
                                    <div class="mb-2">
                                        <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong>
                                        @if (is_array($value) || is_object($value))
                                            <pre class="text-break" style="white-space: pre-wrap; word-wrap: break-word;">
                                                {{ json_encode($value, JSON_PRETTY_PRINT) }}
                                            </pre>
                                        @else
                                            <span>{{ $value }}</span>
                                        @endif
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <x-action-button href="#" color="info">Detalhes</x-action-button>
                                <x-action-button href="#" color="secondary">Editar</x-action-button>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>
