@php
    use App\Models\Usuario;
    //dd($schema);
@endphp

<x-layout>
    <x-slot:heading>
        Gerenciar {{ $tableName }}
    </x-slot:heading>

    <div class="container">
        <!-- Botão para Adicionar Novo -->
        <div class="mb-3 text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                Adicionar Novo
            </button>
        </div>
        <!-- Exibindo mensagens de sucesso ou erro -->
        <x-alert-message></x-alert-message>

        <!-- Tabela -->
        <div class="card">
            @if ($data != null)
                <x-table>
                    <x-slot:headers>
                        <th>Dados</th>
                        <th>Ações</th>
                    </x-slot:headers>

                    <x-slot:rows>
                        @foreach ($data as $schema)
                            <tr>
                                <td>
                                    @if ($tableName == 'profissional_saudes' || $tableName == 'administrador' || $tableName == 'pacientes')
                                        <div class="mb-2">
                                            <strong>Nome:</strong><span>
                                                {{ Usuario::find($schema->idUsuario)->nome }}
                                            </span>
                                        </div>
                                    @endif

                                    @foreach ($schema as $key => $value)
                                        @if ($key !== 'created_at' && $key !== 'updated_at' && $key !== 'idUsuario')
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
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <!-- Usando a chave primária dinamicamente -->
                                    <button class="btn btn-primary mb-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-{{ $schema->{$primaryKey} }}">
                                        Editar
                                    </button>
                                    <form action="/ag/{{ $tableName }}/delete/{{ $schema->{$primaryKey} }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mb-2">Excluir</button>
                                    </form>
                                    @if ($tableName == 'exames')
                                        <button class="btn btn-sucess mb-2" data-bs-toggle="modal"
                                            data-bs-target="#add-{{ $schema->{$primaryKey} }}">
                                            Adicionar Resultado
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <!-- Modal de Editar -->
                            <x-modal id="edit-{{ $schema->{$primaryKey} }}" title="Editar entrada">
                                <form method="POST"
                                    action="/ag/{{ $tableName }}/update/{{ $schema->{$primaryKey} }}">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        @if ($tableName == 'profissional_saudes' || $tableName == 'administrador' || $tableName == 'pacientes')
                                            <div class="mb-2">
                                                <label for="nome" class="form-label">Nome:</label>
                                                <input type="text" id="nome" name="nome" class="form-control"
                                                    value="{{ Usuario::find($schema->idUsuario)->nome }}">
                                            </div>
                                        @endif

                                        @foreach ($schema as $key => $value)
                                            @if ($key !== 'created_at' && $key !== 'updated_at' && $key !== 'idUsuario' && $key !== 'resultado')
                                                <!-- Não exibe o campo 'created_at' -->
                                                <div class="mb-2">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}:</label>
                                                    <input type="text" id="{{ $key }}"
                                                        name="{{ $key }}" class="form-control"
                                                        value="{{ $value }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="updated_at" value="{{ now() }}">
                                    <!-- Atualiza 'updated_at' para a data atual -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </x-modal>

                            <!-- Modal de Adicionar novo Resultado -->
                            <x-modal id="add-{{ $schema->{$primaryKey} }}" title="Adicionar Resultado de Exame">
                                <form action="/file-upload" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file">

                                    <input type="hidden" name="updated_at" value="{{ now() }}">
                                    <!-- Atualiza 'updated_at' para a data atual -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Realizar Upload</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </x-modal>
                        @endforeach
                    </x-slot:rows>
                </x-table>
            @else
                <h1>Nenhum Dado encontrado.</h1>
            @endif
        </div>
    </div>
    <x-modal id="new" title="Nova entrada">
        <form method="POST" action="/ag/{{ $tableName }}/new">
            @csrf
            @method('POST')
            <div class="mb-3">
                @if ($tableName == 'profissional_saudes' || $tableName == 'administrador' || $tableName == 'pacientes')
                    <div class="mb-2">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" value=""
                            required>
                    </div>
                @endif

                @foreach ($schema as $key => $value)
                    @if ($key !== 'created_at' && $key !== 'updated_at' && $key !== 'idUsuario')
                        <!-- Exclui os campos 'created_at' e 'updated_at' -->
                        <div class="mb-2">
                            <label for="{{ $key }}"
                                class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}:</label>
                            <input type="text" id="{{ $key }}" name="{{ $key }}"
                                class="form-control" value="" required>
                        </div>
                    @endif
                @endforeach
            </div>
            <input type="hidden" name="created_at" value="{{ now() }}">
            <!-- Define created_at como a data atual -->
            <input type="hidden" name="updated_at" value="{{ now() }}">
            <!-- Define updated_at como a data atual -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </form>
    </x-modal>
</x-layout>
