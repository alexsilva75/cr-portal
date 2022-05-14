<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('customer',100)->nullable();
            $table->string('attendant',100)->nullable();
            $table->bigInteger('customer_conn_id')->nullable();
            $table->bigInteger('attendant_conn_id')->nullable();
            $table->string('customer_cpfcnpj',25)->nullable();
            $table->unsignedBigInteger('customer_external_id')->nullable();
            $table->unsignedBigInteger('attendant_external_id')->nullable();
            $table->unsignedBigInteger('attendant_id')->nullable();
            $table->string('customer_external_username',150)->nullable();
            $table->string('attendant_external_username',150)->nullable();
            $table->dateTime('end_session')->nullable();
            $table->string('status',10);
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
        Schema::dropIfExists('chat_sessions');
    }
}
