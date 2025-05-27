<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
   {
       Schema::create('products', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->decimal('price', 10, 2);
           $table->unsignedBigInteger('supplier_id');
           $table->binary('image')->nullable();
           $table->timestamps();

           $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
       });

        DB::statement('ALTER TABLE products MODIFY image LONGBLOB NULL');
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
