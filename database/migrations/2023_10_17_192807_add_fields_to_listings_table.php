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
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedSmallInteger('area');

            $table->tinyText('city');
            $table->tinyText('zipcode');
            $table->tinyText('street');
            $table->tinyText('street_num');

            $table->unsignedInteger('price');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('listings', function (Blueprint $table) {
        //     $table->dropColumn()
        // });

        Schema::dropColumns('listings', [
            'bedrooms', 'bathrooms', 'area', 'city', 'zipcode', 'street', 'street_num', 'price'
        ]);
    }
};
