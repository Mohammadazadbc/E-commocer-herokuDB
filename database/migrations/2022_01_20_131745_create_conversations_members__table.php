<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations_members', function (Blueprint $table) {
            $table->bigInteger('conversations_id')->unsigned();
            $table->bigInteger('members_id')->unsigned();
            $table->foreign('conversations_id')->references('id')->on('conversations')->onDelete('cascade');
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations_members_');
    }
}
