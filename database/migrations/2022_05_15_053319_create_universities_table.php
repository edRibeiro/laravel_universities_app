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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('alpha_two_code');
            $table->string('domains');
            $table->string('country');
            $table->string('web_pages');
            $table->string('name');
            $table->string('status');
            $table->unsignedBigInteger('suggested_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('suggested_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universities');
    }
};
