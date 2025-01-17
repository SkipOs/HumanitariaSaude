<?php

use App\Models\Agendamento;
use App\Models\Prontuario;
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
        Schema::create('exames', function (Blueprint $table) {
            $table->id('idExame');
            $table->foreignIdFor(Prontuario::class, 'idProntuario');
            $table->string('tipo');
            $table->text('resultado')->nullable();
            $table->foreignIdFor(Agendamento::class, 'idAgendamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exames');
    }
};
