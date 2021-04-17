<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('from_id');
            $table->bigInteger('to_id');
            $table->string('place')->nullable();
            $table->string('type_of_shoot')->nullable();
            $table->date('date_of_shoot')->nullable();
            $table->string('user_name')->nullable();
            $table->text('user_profilepic')->nullable();
            $table->string('user_email')->nullable();
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
        Schema::dropIfExists('quote_requests');
    }
}
