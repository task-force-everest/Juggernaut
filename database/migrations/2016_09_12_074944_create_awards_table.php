<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('award_member', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('award_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->dateTime('awarded_at');
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('award_member');
        Schema::dropIfExists('awards');
    }
}
