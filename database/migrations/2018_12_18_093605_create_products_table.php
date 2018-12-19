<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('category_id')->references('id')->on('categories');
            $table->string('title', 500)->index();
            $table->string('date_expiration')->nullable();
            $table->string('unit')->nullable();
            $table->string('pcs')->nullable();
            $table->string('price')->nullable();
            $table->string('price_two')->nullable();
            $table->string('price_three')->nullable();
            $table->string('links')->nullable();
            $table->string('status', 16);
            NestedSet::columns($table);
            $table->timestamps();
        });

//        \Illuminate\Support\Facades\DB::statement('ALTER TABLE products ADD FULLTEXT search(title)');
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
}
