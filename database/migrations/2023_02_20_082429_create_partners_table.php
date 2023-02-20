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
        Schema::create('partners', function (Blueprint $table) {
            $table->comment('');
            $table->increments('id');
            $table->string('firstname', 20);
            $table->string('lastname', 20);
            $table->string('identification', 11);
            $table->date('birthday');
            $table->string('genere', 10);
            $table->string('class', 10);
            $table->string('sector', 15);
            $table->string('group', 15);
            $table->integer('site_id');
            $table->string('created_user_at', 20);
            $table->string('updated_user_id', 20);
            $table->timestamps();
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
        Schema::dropIfExists('partners');
    }
};
