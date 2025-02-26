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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        \App\Models\Company::create([
            'name' => 'XEFI LYON'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI MACON'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI BOURG'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI MONACO'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI BASTIA'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI LSE'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI LSO'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI LNO'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI VENDOME'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI NICE'
        ]);

        \App\Models\Company::create([
            'name' => 'XEFI CLERMONT'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
