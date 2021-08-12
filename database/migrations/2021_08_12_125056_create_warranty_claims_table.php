<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_claims', function (Blueprint $table) {
            $table->id();
            $table->string('wclaim_id');
            $table->string('sales_id');
            $table->string('employee_id');
            $table->date('issue_date');
            $table->string('issue_desc');
            $table->string('repair_status');
            $table->string('warranty_status');
            $table->date('resolution_date');
            $table->string('resolution_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranty_claims');
    }
}
