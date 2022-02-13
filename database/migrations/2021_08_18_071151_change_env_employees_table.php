<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEnvEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('env_employees', function(Blueprint $table) {
            $table->date('date_of_birth');
            $table->string('employment_id')->nullable();
            $table->foreign('employment_id')->references('employment_id')->on('employment_type');
            $table->string('department_id')->nullable();
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->date('hired_date');
            $table->float('salary')->default(0);
            $table->string('salary_term')->default('Monthly');
            $table->string('role_id')->nullable();
            $table->foreign('role_id')->references('role_id')->on('user_roles');
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->longText('address');
            $table->string('status')->default('INACTIVE');
        });

        Schema::table('departments', function(Blueprint $table) {
            $table->string('reports_to')->nullable();
            $table->foreign('reports_to')->references('employee_id')->on('env_employees');
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
        Schema::table('departments', function(Blueprint $table){
            $table->dropForeign(['reports_to']);
            $table->dropColumn('reports_to');
        });

        Schema::table('env_employees', function(Blueprint $table){
            $table->dropColumn('status');
            $table->dropColumn('address');
            $table->dropColumn('is_admin');
            $table->dropColumn('password');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('salary_term');
            $table->dropColumn('salary');
            $table->dropColumn('hired_date');
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
            $table->dropForeign(['employment_id']);
            $table->dropColumn('employment_id');
            $table->dropColumn('date_of_birth');
        });
    }
}
