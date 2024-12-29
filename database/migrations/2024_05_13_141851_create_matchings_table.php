<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchings', function (Blueprint $table) {
            $table->id();
            $table->datetime("when");
            $table->enum('status',['not_started','finished','live']);
            $table->unsignedBigInteger("club1_id");
            $table->foreign("club1_id")->references("id")->on("clubs")->onDelete("CASCADE");
            $table->integer('club1_score');
            $table->unsignedBigInteger("club2_id");
            $table->foreign("club2_id")->references("id")->on("clubs")->onDelete("CASCADE");
            $table->integer('club2_score');
            $table->string('city');
            $table->string('stadium');
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
        Schema::dropIfExists('matching');
    }
};
