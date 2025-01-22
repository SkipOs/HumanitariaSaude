<?php

use App\Models\Usuario;
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
        Schema::create('profissional_saudes', function (Blueprint $table) {
            $table->id('crm')->primary();
            $table->foreignIdFor(Usuario::class,'idUsuario');
            $table->string('especialidade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissional_saudes');
    }
};
