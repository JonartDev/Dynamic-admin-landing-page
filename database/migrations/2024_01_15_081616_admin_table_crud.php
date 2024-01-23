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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // 	988娱乐城
            $table->string('logo')->nullable(); //logo/2oIPaOHbjO4Gvhi3EZ3YEeaS8QbshnsBaBYb52Gd.png 	
            $table->string('webimage')->nullable();
            $table->string('info'); //Information of admin
            $table->string('link'); //https://179988.vip
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
