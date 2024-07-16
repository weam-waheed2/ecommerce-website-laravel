<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWfPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_posts', function (Blueprint $table) {
            $table->bigIncrements('ID');

            $table->bigInteger('post_author')->unsigned()->default(1);
            $table->foreign('post_author')->references('id')->on('users');

            $table->text('post_title');
            $table->text('post_slug');
            $table->text('post_type');

            $table->longText('post_content')->nullable();
            $table->text('post_status')->default('draft');
            $table->text('post_image')->nullable();

            $table->bigInteger('post_parent')->default(0);

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
        Schema::dropIfExists('wf_posts');
    }
}
