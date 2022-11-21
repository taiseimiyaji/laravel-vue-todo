<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tree_paths', static function (Blueprint $table) {
            $table->integer('ancestor');
            $table->integer('descendant');
            $table->integer('path_length');
            $table->primary(['ancestor', 'descendant']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tree_paths');
    }
}
