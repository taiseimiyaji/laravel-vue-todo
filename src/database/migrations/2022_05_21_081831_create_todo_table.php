<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('task', static function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->string('name', 255);
            $table->string('detail', 1000);
            $table->dateTime('deadline');
            $table->integer('cost');
            $table->string('status_id');
            $table->integer('sort');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
}
