<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWfTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_terms', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->text('name');
            $table->text('slug')->nullable();
            $table->text('taxonomy');
            $table->bigInteger('parent')->default(0);
            $table->longText('image')->nullable();
            $table->text('bg')->nullable();
            $table->bigInteger('post_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wf_terms');
    }
}
