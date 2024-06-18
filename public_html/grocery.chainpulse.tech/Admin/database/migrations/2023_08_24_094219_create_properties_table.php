<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('provider_id');
            $table->string('property_name');
            $table->string('type');
            $table->string('price');
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
              $table->string('image');   
            $table->string('living_area');
            $table->string('land_area');
            $table->string('pieces');
            $table->string('rooms');
            $table->string('project_type_ids');    
            $table->string('outside_ids');    
            $table->string('exposure_ids');  
            $table->string('floor_ids');    
            $table->string('acessbility_ids'); 
            $table->string('surface_ids')->nullable(true); 
            $table->string('status')->default('0'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
