<?php

use App\Models\Consulta;
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
        Schema::create('prescricaos', function (Blueprint $table) {
            $table->id('idPrescricao');
            $table->foreignIdFor(Consulta::class, 'idConsulta');
            $table->string('nomeMedicamento');
            $table->text('dosagem')->nullable();
            $table->date('data');
            $table->timestamps();
        });
             
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescricaos');
    }
};
