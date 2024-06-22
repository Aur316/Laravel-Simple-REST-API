<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id')->constrained()->onDelete('cascade');
            $table->string('description');
            $table->enum('type', ['fault', 'investment', 'other']);
            $table->enum('status', ['inprogress', 'done', 'failed']);
            $table->string('gps_coordinates')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('task_worker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->onDelete('cascade');
            $table->foreignId('worker_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_worker');
        Schema::dropIfExists('tasks');
    }
};
