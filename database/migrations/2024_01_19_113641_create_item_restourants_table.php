<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_restourants', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger("restourant_id");
            $table->foreign("restourant_id")->references("id")->on("restourants");
            $table->unsignedBigInteger("item_id");
            $table->foreign("item_id")->references("id")->on("items");
         
            $table->unique(["restourant_id","item_id"]);
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
        Schema::dropIfExists('item_resturants');
    }
};
