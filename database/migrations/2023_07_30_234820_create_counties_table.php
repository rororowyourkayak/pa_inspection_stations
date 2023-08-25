<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\County;
use App\Models\Station;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('counties', function (Blueprint $table) {
            $table->id();
            $table->string('county',30);
            $table->string('county_slug',35);
            $table->unsignedInteger('county_count');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counties');
    }
};
