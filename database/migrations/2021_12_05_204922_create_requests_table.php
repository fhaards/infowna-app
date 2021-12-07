<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->char('req_id',36)->primary();
            $table->char('uuid',36);
            $table->string('name');
            $table->string('passport_id');
            $table->string('email');
            $table->string('gender',7);
            $table->string('phone',25);
            $table->string('nationality');
            $table->text('address_indonesia');
            $table->text('passport_img')->nullable();
            $table->string('req_status',25);
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
        Schema::dropIfExists('requests');
    }
}
