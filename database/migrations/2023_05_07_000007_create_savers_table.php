<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaversTable extends Migration
{
    public function up()
    {
        Schema::create('savers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('thirdname')->nullable();
            $table->string('email')->unique();
            $table->string('phone_1')->unique();
            $table->string('phone_2')->nullable();
            $table->string('password');
            $table->string('type');
            $table->string('account_number')->nullable();
            $table->decimal('savings', 15, 2)->nullable();
            $table->string('shares')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
