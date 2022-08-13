<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_call', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string('surname',255);
            $table->string('email', 255);
            $table->string('cpf_cnpj', 18);
            $table->date('birthdate')->nullable();
            $table->text('address');
            $table->string('address_number');
            $table->string('neighborhood');
            $table->string('address_reference')->nullable();
            $table->string('city', 255);
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
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
        Schema::dropIfExists('subscription_call');
    }
}
