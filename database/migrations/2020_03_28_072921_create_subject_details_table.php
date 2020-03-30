<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subject_id');
            $table->smallInteger('order')->default(1);
            $table->text('title')->nullable();
            $table->text('url');
            $table->longText('note')->nullable()->default('text');
            $table->text('attachment')->nullable();
            $table->boolean('published')->nullable()->default(false);
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
        Schema::dropIfExists('subject_details');
    }
}
