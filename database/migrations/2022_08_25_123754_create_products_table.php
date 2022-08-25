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
            $table->increments('pro_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_category_id');
            $table->integer('pro_brand_id');
            $table->decimal('pro_price', 12, 0);
            $table->float('pro_sale', 3, 0);
            $table->integer('pro_quantity');
            $table->text('pro_description')->nullable();
            $table->text('pro_content')->nullable();
            $table->string('pro_avatar');
            $table->integer('color_id');
            $table->integer('pro_view')->default(0);
            $table->string('pro_detail')->nullable();
            $table->tinyInteger('group_id')->default(0);
            $table->tinyInteger('pro_active')->default(1);
            $table->tinyInteger('pro_hot')->default(0);
            $table->softDeletes();
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