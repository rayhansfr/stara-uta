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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('c1', 5, 3);
            $table->decimal('c2', 5, 3);
            $table->decimal('c3', 5, 3);
            $table->decimal('c4', 5, 3);
            $table->boolean('status')->default(false);
            $table->decimal('nilai_utilitas', 8, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
