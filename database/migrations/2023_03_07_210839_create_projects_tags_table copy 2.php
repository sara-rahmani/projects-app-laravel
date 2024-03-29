<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('projects_id')->unsigned();
            $table->unsignedBiginteger('tags_id')->unsigned();

            $table->foreign('projects_id')->references('id')
                    ->on('projects')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')
                    ->on('tags')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_tags');
    }
};
