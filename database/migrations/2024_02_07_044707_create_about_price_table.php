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
        Schema::create('about_price', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок
            $table->text('description'); // Описание
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();
            $table->text('description_3')->nullable();
            $table->text('description_4')->nullable();

            $table->integer('price')->nullable(); // nullable() добавляется, если вы разрешаете значение 'price' быть NULL
            $table->timestamps();
            $table->boolean('status')->default(1); // Статус, по умолчанию 1 (active)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_price');
    }
};
