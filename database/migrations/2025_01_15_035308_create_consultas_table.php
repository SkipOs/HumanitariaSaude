<?php

use App\Models\Agendamento;
use App\Models\Instituicao;
use App\Models\Paciente;
use App\Models\ProfissionalSaude;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('idConsulta');
            $table->foreignIdFor(Instituicao::class,'idInstituicao');
            $table->foreignIdFor(ProfissionalSaude::class,'idProfissionalSaude');
            $table->foreignIdFor(Paciente::class,'idPaciente');
            $table->foreignIdFor(Agendamento::class,'idAgendamento')->nullable();
            $table->text('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
