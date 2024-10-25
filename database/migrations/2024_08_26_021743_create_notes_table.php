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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pic_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('facility_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->string('name');
            $table->date('date');
            $table->time('time');
            $table->string('problem');
            $table->string('activity');
            $table->enum('status', ['todo', 'pending', 'inprogress', 'done', 'cancel']);
            $table->string('image')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};