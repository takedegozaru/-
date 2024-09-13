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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->integer('point_number');
            $table->foreignId('set_id')->constrained()->onDelete('cascade');
            $table->foreignId('reason_id')->constrained;
            $table->string('text')->nullable(true); //備考
            $table->foreignId('school_id')->constrained();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
