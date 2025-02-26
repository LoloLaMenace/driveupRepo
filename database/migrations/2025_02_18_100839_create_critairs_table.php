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
        Schema::create('critairs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('number');
        });

        \App\Models\Critair::create([
            'number' => '1'
        ]);
        \App\Models\Critair::create([
            'number' => '2'
        ]);
        \App\Models\Critair::create([
            'number' => '3'
        ]);
        \App\Models\Critair::create([
            'number' => '4'
        ]);
        \App\Models\Critair::create([
            'number' => '5'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critairs');
    }
};
