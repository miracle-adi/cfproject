<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('verified_status')->default(false);
            $table->string('coop_name');
            $table->string('coop_ref_num');
            $table->date('est_date');
            $table->text('coop_address');
            $table->string('coop_city');
            $table->string('coop_postcode');
            $table->string('coop_state');
            $table->string('coop_telephone', 20);//number
            $table->string('coop_fax', 20)->nullable();//number
            $table->string('email')->unique();
            $table->string('business_type');
            $table->string('address_address')->nullable();
            $table->double('address_latitude')->nullable();
            $table->double('address_longitude')->nullable();
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
        Schema::dropIfExists('coops');
    }
}
