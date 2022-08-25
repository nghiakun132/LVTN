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
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('b_id');
            $table->string('b_name');
            $table->string('b_slug');
            $table->integer('b_category_id')->default(0);
            $table->string('b_banner')->nullable();
            $table->boolean('b_status')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['b_name', 'b_category_id'], 'unique_record');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};