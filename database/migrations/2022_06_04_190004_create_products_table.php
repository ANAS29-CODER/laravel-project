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
        Schema::create('products', function (Blueprint $table) {

                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
               $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
               $table->text('description')->nullable();
               $table->string('img_path')->nullable();
                $table->unsignedFloat('price')->default(0);
                $table->unsignedFloat('sale_price')->default(0);
                $table->unsignedSmallInteger('quantity')->default(0);
                 $table->string('sku')->unique()->nullable();
                 $table->unsignedFloat('weight')->nullable();
                 $table->unsignedFloat('width')->nullable();
                 $table->unsignedFloat('height')->nullable();
                 $table->unsignedFloat('length')->nullable();
                 $table->enum('status',['active','draft']);
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
        Schema::dropIfExists('products');
    }
};
