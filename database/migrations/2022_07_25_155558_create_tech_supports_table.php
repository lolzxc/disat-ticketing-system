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
        Schema::create('tech_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_id');
            $table->foreignId('triage_id');
            $table->foreignId('tse_id');
            $table->text('actions_done');
            $table->string('remarks');
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
        Schema::dropIfExists('tech_supports');
    }
};
