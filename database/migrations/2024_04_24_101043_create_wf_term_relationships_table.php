<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWfTermRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_term_relationships', function (Blueprint $table) {
            $table->bigIncrements('ID');

            $table->bigInteger('post_ID')->unsigned();
            $table->foreign('post_ID')->references('ID')->on('wf_posts')->onDelete('cascade');

            $table->bigInteger('term_ID')->unsigned();
            $table->foreign('term_ID')->references('ID')->on('wf_terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wf_term_relationships');
    }
}
