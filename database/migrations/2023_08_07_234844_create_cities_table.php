<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;
use App\Models\Station;
use App\Models\County;



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
            $table->bigInteger('county_id');
            $table->unsignedInteger('city_count');
        });

        $cities = Station::select('city','county')->groupBy('city','county')->orderBy('city', 'ASC')->get();
    
        foreach($cities as $city){
            City::insert([
                'city' => $city -> city,
                'city_slug' => Str::slug($city -> city),
                'city_count' => Station::where('city', $city -> city)->count(),
                'county_id' => County::where('county',$city -> county)->first()->id
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
