<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->increments('id');  // первичный ключ

            $table->string('surname',45);
            $table->string('name',45);
            $table->string('patronymic',45);

            $table->string('passport',10)->unique();

            $table->date("birth");//Дата рождения

            $table->string("mail");
            $table->string("number");

            $table->string('registration',255);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
