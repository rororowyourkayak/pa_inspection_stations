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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('county',30);
            $table->string('station_name', 100);
            $table->string('ois_number', 5);
            $table->string('station_address', 200);
            $table->string('mailing_address', 200);
            $table->string('phone_number',15)->nullable();
            $table->string('passenger_cars_and_light_trucks',1);
            $table->string('medium_trucks',1);
            $table->string('heavy_trucks',1);
            $table->string('motorcycle',1);
            $table->string('trailer_less_10000',1);
            $table->string('trailer_greater_10000',1);
            $table->string('station_street_address', 100)->nullable();
            $table->string('station_city', 100)->nullable();
            $table->string('station_zip', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
