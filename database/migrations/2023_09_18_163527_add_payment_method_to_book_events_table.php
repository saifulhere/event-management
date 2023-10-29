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
        Schema::table('book_events', function (Blueprint $table) {
            $table->string('payment_method')->nullable();
            $table->string('trxn_id')->nullable();
            $table->string('payment_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_events', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('trxn_id');
            $table->dropColumn('payment_number');
        });
    }
};
