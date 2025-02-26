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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 20);
        });

        \App\Models\Status::create([
            'name' => 'Attribué'
        ]);

        \App\Models\Status::create([
            'name' => 'Disponible'
        ]);

        \App\Models\Status::create([
            'name' => 'Commandé'
        ]);

        \App\Models\Status::create([
            'name' => 'Restitué'
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
