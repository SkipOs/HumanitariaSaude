<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Consulta;
use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function exame(Request $request)
    {
        //        dd(Auth::user()->paciente->prontuarios);
        $date = $request->input('dataAgendamento'); // Get the date input
        $time = $request->input('horaAgendamento'); // Get the time input
        $combinedDateTime = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);

        $ida = Agendamento::factory()->create([
            'data' => $combinedDateTime,
        ]);

        Exame::create([
            'idProntuario' => Auth::user()->paciente->prontuarios->idProntuario,
            'tipo' => $request->input('tipoExame'),
            'idAgendamento' => $ida->idAgendamento,
            'resultado' => '',
        ]);

        return redirect()->back()->with('success', 'Exame agendado com sucesso!');
    }

    public function consulta(Request $request)
    {
        //dd(Auth::user()->paciente->cpf);
        $date = $request->input('dataAgendamento'); // Get the date input
        $time = $request->input('horaAgendamento'); // Get the time input
        $combinedDateTime = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);

        $ida = Agendamento::factory()->create([
            'data' => $combinedDateTime,
        ]);

        Consulta::create([
            'cpf' => Auth::user()->paciente->cpf,
            'idInstituicao' => $request->input('idLocal'),
            'crm' => $request->input('idProfissional'),
            'idAgendamento' => $ida->idAgendamento,
            'motivo' => '',
        ]);

        return redirect()->back()->with('success', 'Exame agendado com sucesso!');
    }
}
