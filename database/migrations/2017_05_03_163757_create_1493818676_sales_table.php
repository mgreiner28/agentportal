<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1493818676SalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->increments('id');
                $table->string('test1')->nullable();
                $table->string('test2')->nullable();
                $table->string('test3')->nullable();
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '34159_5909dd34ece4d')->references('id')->on('users')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
