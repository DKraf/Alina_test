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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')
                ->nullable()
                ->constrained('dictionaries_status')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('priority_id')
                ->nullable()
                ->constrained('dictionaries_priority')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
