<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWarrantyAddCustomerNameProductCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('warranty_claims', function (Blueprint $table) {
            $table->string('customer_name');
            $table->string('product_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('warranty_claims', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('product_code');
        });
    }
}
