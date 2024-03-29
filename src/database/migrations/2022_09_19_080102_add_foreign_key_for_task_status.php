<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyForTaskStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('task', static function (Blueprint $table) {
            $table->foreign('status_id')
                ->references('id')
                ->on('task_status')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('task', static function (Blueprint $table){
            $table->dropForeign('task_status_id_foreign');
        });
    }
}
