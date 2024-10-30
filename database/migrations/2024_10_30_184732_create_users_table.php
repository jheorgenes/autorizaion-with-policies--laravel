<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('password', 200);
            $table->string('role', 20);
            $table->timestamps();
            $table->softDeletes(); //adicionando soft deletes
        });

        //Criando uma pivot table (tabela paralela para relacionamentos)
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); //unsigned só insere valores positivos
            $table->string('permission', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('users_permissions');
    }
};
