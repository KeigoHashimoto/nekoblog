<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleTags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articles_id');
            $table->unsignedBigInteger('tags_id');
            $table->timestamps();

            $table->foreign('articles_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleTags',function(Blueprint $table){
            $table->dropForeign('articleTags_articles_id_foreign');
            $table->dropForeign('articleTags_tags_id_foreign');
        });
    }
}
