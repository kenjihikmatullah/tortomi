<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turtle_type_id');
            $table->foreign('turtle_type_id')->references('id')->on('turtle_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image_path', 100)->default(null);
            $table->string('title', 75);
            $table->text('body');
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
