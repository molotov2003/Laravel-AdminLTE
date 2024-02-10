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
        //con el Schema podemos Crear el nombre y los campos de la tabla
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         //Cuando se hace un refresh con el comando php artisan migrate:fresh todas las tablas de la base de datos se borran
        //el metodo dropIfExist se utiliza para borrar la tabla si existe y volverla a crear
        Schema::dropIfExists('personal_access_tokens');
    }
};
