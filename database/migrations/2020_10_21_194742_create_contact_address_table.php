<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_address', function (Blueprint $table) {
            $table->id();
            $table->text('address_en');
            $table->text('address_bn');
            $table->string('email');
            $table->integer('phone_en')->nullable();
            $table->string('phone_bn')->nullable();
            $table->bigInteger('telephone_en')->nullable();
            $table->string('telephone_bn')->nullable();
            $table->bigInteger('fax_en')->nullable();
            $table->string('fax_bn')->nullable();
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
        Schema::dropIfExists('contact_address');
    }
}
