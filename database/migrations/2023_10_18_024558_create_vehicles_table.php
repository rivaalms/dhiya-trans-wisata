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
      Schema::create('vehicles', function (Blueprint $table) {
         $table->id();
         $table->uuid('uuid');
         $table->string('name');
         $table->string('slug');
         $table->string('capacity', 20);
         $table->integer('price');
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('vehicles');
   }
};
