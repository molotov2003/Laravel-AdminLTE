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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         //Cuando se hace un refresh con el comando php artisan migrate:fresh todas las tablas de la base de datos se borran
        //el metodo dropIfExist se utiliza para borrar la tabla si existe y volverla a crear
        Schema::dropIfExists('failed_jobs');
    }
};
