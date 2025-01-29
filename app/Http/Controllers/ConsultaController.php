<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function update(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'idAgendamento' => 'required',
            'newDate' => 'required|date',
        ]);

        // Parse da nova data e hora
        $newDate = Carbon::parse($request->newDate);
        $dayOfWeek = $newDate->dayOfWeek; // 0 = Domingo, 6 = Sábado
        $hour = $newDate->hour;
        $minute = $newDate->minute;

        // Restrições: Apenas dias úteis, horário de 06:00 às 17:00, intervalos de 30 min
        if ($dayOfWeek == 0 || $dayOfWeek == 6) {
            return redirect()->back()->with('error', 'Apenas dias úteis permitidos.');
        }

        if ($hour < 6 || $hour >= 17) {
            return redirect()->back()->with('error', 'Horário fora do permitido. O horário deve ser entre 06:00 e 17:00.');
        }

        if ($minute % 30 !== 0) {
            return redirect()->back()->with('error', 'Intervalo inválido. Escolha um horário com 30 minutos de diferença.');
        }

        // Atualizar a data no banco de dados
        DB::table('agendamentos')
            ->where('idAgendamento', $request->idAgendamento)
            ->update(['data' => $newDate]);

        // Redireciona de volta com a mensagem de sucesso
        return redirect()->back()->with('success', 'Data alterada com sucesso!');
    }

    public function cancelar($id)
    {
        // Deleta o agendamento
        DB::table('consultas')->where('idAgendamento', $id)->delete();

        DB::table('agendamentos')->where('idAgendamento', $id)->delete();

        // Redireciona de volta com a mensagem de sucesso
        return redirect()->back()->with('success', 'Consulta cancelada com sucesso!');
    }
}
