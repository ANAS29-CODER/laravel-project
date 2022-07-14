<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\softDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

             $table->string('name');
              $table->string('slug')->uniqid();
               $table->foreignId('parent_id')->nullable()->constrained('categories','id')->nullOnDelete();
               $table->text('description')->nullable();
               $table->string('img')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
