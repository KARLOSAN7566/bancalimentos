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
        Schema::create('materials', function (Blueprint $table) {
            $table->comment('');
            $table->increments('id');
            $table->text('description');
            $table->integer('point_for_kilogram');
            $table->timestamp('created_at')->nullable();
            $table->string('created_user_id', 20);
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_user_id', 20);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
};
