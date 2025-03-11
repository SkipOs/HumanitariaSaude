<?php

namespace App\Http\Controllers;

use App\Models\Prontuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TableController extends Controller
{
    // Método para adicionar nova entrada
    public function new(Request $request, $table)
    {
        // Pega todos os dados do formulário
        $data = $request->except(['_token', '_method', 'nome']); // Remove '_token' e '_method'

        // Adiciona o timestamp atual para os campos 'created_at' e 'updated_at'
        $data['created_at'] = now();
        $data['updated_at'] = now();

        if ($table == 'profissional_saudes' || $table == 'administrador' || $table == 'pacientes') {
            if ($table == 'profissional_saudes') {
                $tipo = 'profissionalSaude';
            }
            if ($table == 'administrador') {
                $tipo = 'administrador';
            }
            if ($table == 'pacientes') {
                $tipo = 'paciente';
            }

            $user = Usuario::factory()->create([
                'nome' => $request['nome'],
                'senha' => bcrypt('password'),
                'tipo' => $tipo,
            ]);

            $data['idUsuario'] = $user->idUsuario;

            if ($table == 'pacientes') {
                Prontuario::factory()->create([
                    'cpf' => $request->cpf,
                ]);
            }
        }

        // Insere os dados na tabela
        DB::table($table)->insert($data);

        // Retorna com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Entrada adicionada com sucesso!');
    }

    // Método para editar uma entrada
    public function update(Request $request, $table, $id)
    {
        // Pega todos os dados do formulário, exceto o '_token' e '_method'
        $data = $request->except(['_token', '_method', 'nome']); // Remove '_token' e '_method'

        // Atualiza apenas o campo 'updated_at' para o timestamp atual
        $data['updated_at'] = now();

        // Obtém o nome da chave primária da tabela (caso seja algo diferente de 'id')
        $primaryKey = $this->getPrimaryKey($table);

        if ($table == 'profissional_saudes' || $table == 'administrador' || $table == 'pacientes') {
            $valor = $request->only(['nome']);
            $idUsuario = DB::table($table)->where($primaryKey, $id)->select('idUsuario');
            Usuario::where('idUsuario', $idUsuario)->update($valor);
        }

        // Atualiza os dados da tabela
        DB::table($table)->where($primaryKey, $id)->update($data);

        return redirect()->back()->with('success', 'Entrada atualizada com sucesso!');
    }

    // Função para obter a chave primária da tabela
    private function getPrimaryKey($table)
    {
        // Supondo que a chave primária seja 'id' por padrão
        // Caso a tabela tenha outro campo como chave primária, altere essa lógica
        $primaryKey = DB::getSchemaBuilder()->getColumnListing($table);
        return in_array('id', $primaryKey) ? 'id' : $primaryKey[0];
    }

    public function delete($table, $id)
    {
        // Obtém a chave primária dinamicamente, se necessário
        $primaryKey = $this->getPrimaryKey($table);

        if ($table == 'profissional_saudes' || $table == 'administrador' || $table == 'pacientes') {
            $idUsuario = DB::table($table)->where($primaryKey, $id)->select('idUsuario');
            Usuario::where('idUsuario', $idUsuario)->delete();
            if ($table == 'pacientes') {
                Prontuario::where('cpf', $id)->delete();
            }
        }

        // Exclui o registro com a chave primária correta
        DB::table($table)->where($primaryKey, $id)->delete();

        return redirect()->back()->with('success', 'Registro excluído com sucesso!');
    }
}
