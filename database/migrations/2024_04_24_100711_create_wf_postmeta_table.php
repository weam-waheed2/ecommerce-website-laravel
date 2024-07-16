<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWfPostmetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_postmeta', function (Blueprint $table) {
            $table->bigIncrements('ID');

            $table->bigInteger('post_ID')->unsigned()->default(1);
            $table->foreign('post_ID')->references('ID')->on('wf_posts')->onDelete('cascade');

            $table->text('meta_key');
            $table->longText('meta_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wf_postmeta');
    }
}
