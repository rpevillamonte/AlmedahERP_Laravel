<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWarrantyClaimsAddAdditionalNotes extends Migration
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
            $table->string('additional_notes');
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
            $table->dropColumn('additional_notes');
        });
    }
}
