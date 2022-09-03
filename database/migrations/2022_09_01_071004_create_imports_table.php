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
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('i_id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->decimal('i_total', 10, 2)->nullable();
            $table->string('i_date');
            $table->string('i_note')->nullable();;
            $table->boolean('i_status')->default(1);
            $table->date('confirm_date')->nullable();
            $table->string('confirm_by')->nullable();
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
        Schema::dropIfExists('imports');
    }
};