<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;
use App\Models\Station;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city',100);
            $table->string('city_slug',105);
            $table->string('county', 30);
            $table->string('county_slug', 35);

            $table->unsignedInteger('city_count');
        });

        $cities = Station::select('city','county')->groupBy('city','county')->orderBy('city', 'ASC')->get();

        foreach($cities as $city){
            City::insert([
                'city' => $city -> city,
                'city_slug' => Str::slug($city -> city),
                'city_count' => Station::where('city', $city -> city)->count(),
                'county' => $city -> county,
                'county_slug' => Str::slug($city -> county)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
