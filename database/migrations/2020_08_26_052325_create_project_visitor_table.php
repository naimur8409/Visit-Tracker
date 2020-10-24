<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_visitor', function (Blueprint $table) {
            $table->unsignedInteger('project_type_id');
            $table->unsignedInteger('visit_id');

            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');

            $table->primary(['project_type_id','visit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_visitor');
    }
}
