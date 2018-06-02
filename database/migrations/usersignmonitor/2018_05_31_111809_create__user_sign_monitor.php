<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSignMonitor extends Migration
{
    protected $timestamps  = false;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_sign_monitor', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->datetime('signin_at')->nullable();
            $table->datetime('signout_at')->nullable();
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_sign_monitor');
    }
}
