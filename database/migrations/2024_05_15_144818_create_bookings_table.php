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
        Schema::create('bookings', function (Blueprint $table) {
 
                $table->id();
                $table->unsignedBigInteger("user_id");
                $table->foreign("user_id")->references("id")->on("users")->onDelete("CASCADE");
                $table->unsignedBigInteger("ticket_id");
                $table->foreign("ticket_id")->references("id")->on("tickets")->onDelete("CASCADE");
                $table->integer('number')->default(1);
                $table->enum("status",['accept','cancel','pause','paid']);
            
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
        Schema::dropIfExists('bookings');
    }
};
