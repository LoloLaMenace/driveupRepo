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
        Schema::create('energies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acronym');
            $table->timestamps();
        });

        \App\Models\Energy::create([
            'name' => 'Essence',
            'acronym' => 'ES'
        ]);
        \App\Models\Energy::create([
            'name' => 'Electrique',
            'acronym' => 'EL'
        ]);
        \App\Models\Energy::create([
            'name' => 'Gazole',
            'acronym' => 'GO'
        ]);
        \App\Models\Energy::create([
            'name' => 'Hybride rechargeable',
            'acronym' => 'EE'
        ]);
        \App\Models\Energy::create([
            'name' => 'Essence-GPL',
            'acronym' => 'EG'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energies');
    }
};
