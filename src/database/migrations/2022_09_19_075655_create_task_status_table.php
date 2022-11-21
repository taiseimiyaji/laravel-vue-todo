<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('task_status', static function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->string('name', 50);
            $table->timestamps();
        });
        // statusの初期設定
        DB::table('task_status')
            ->insert(
                [
                    'id' => '01GJD2P2DH49F297EDB8W89Z21',
                    'name' => 'ToDo',
                ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('task_status');
    }
}
