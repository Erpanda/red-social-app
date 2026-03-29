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
        // Debemos especifica a que tabla hacemos referencia
        Schema::create('seguidores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seguidor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('seguido_id')->constrained('users')->onDelete('cascade');
            $table->boolean('activo')->default(true);
            $table->timestamp('unfollowed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguidors');
    }
};
