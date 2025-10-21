<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('member_thematic_answers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('event_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_thematic_answers');
    }
};
