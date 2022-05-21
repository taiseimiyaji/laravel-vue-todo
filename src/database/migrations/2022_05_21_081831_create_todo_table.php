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
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task_name', 255);
            $table->string('task_label', 255)->nullable();
            $table->integer('task_cost')->nullable();
            $table->dateTime('task_deadline')->nullable();
            $table->string('task_detail', 1000)->nullable();
            $table->string('task_todos', 1000)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo');
    }
}
