<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('assigned_to')->unsigned();
            $table->string('desc')->nullable(true);
            $table->date('start_date')->nullable(true);
            $table->date('due_date')->nullable(true);
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->enum('status', ['doing', 'todo', 'done', 'skipped', 'cancelled']);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('todos', function (Blueprint $table) {
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
