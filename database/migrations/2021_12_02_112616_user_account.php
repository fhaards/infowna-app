<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_account', function (Blueprint $table) {
            $table->char('uuid', 36);
            $table->string('gender',7)->nullable();
            $table->string('phone')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->text('country')->nullable();
            $table->text('districts')->nullable();
            $table->text('postcode')->nullable();
            $table->text('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_account');
    }
}
