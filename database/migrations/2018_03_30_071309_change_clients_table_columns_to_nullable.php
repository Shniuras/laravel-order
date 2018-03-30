<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeClientsTableColumnsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('vat_number', 50)->nullable()->change();
            $table->string('registration_number', 50)->nullable()->change();
            $table->string('registration_address', 255)->nullable()->change();
            $table->string('shipping_address', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('vat_number', 50)->nullable(false)->change();
            $table->string('registration_number', 50)->nullable(false)->change();
            $table->string('registration_address', 255)->nullable(false)->change();
            $table->string('shipping_address', 255)->nullable(false)->change();
        });
    }
}
