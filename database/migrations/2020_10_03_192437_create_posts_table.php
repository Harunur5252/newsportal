<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('subcat_id')->nullable();
            $table->integer('dist_id');
            $table->integer('subdist_id')->nullable();
            $table->string('user_id');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('slug_en');
            $table->string('slug_bn');
            $table->string('image');
            $table->longText('details_en')->nullable();
            $table->longText('details_bn');
            $table->text('tags_en')->nullable();
            $table->text('tags_bn');
            $table->string('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
