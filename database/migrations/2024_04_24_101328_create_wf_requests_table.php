<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWfRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_requests', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->text('form_name')->nullable();
            $table->text('name')->nullable();
            $table->text('email');
            $table->text('phone')->nullable();
            $table->text('country')->nullable();

            $table->longText('url')->nullable();
            $table->longText('note')->nullable();
            $table->longText('json')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wf_requests');
    }
}
