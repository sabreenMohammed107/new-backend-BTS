<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string("section_name");
            $table->longText("small_description")->nullable();
            $table->longText("details")->nullable();
            $table->longText("details2")->nullable();
            $table->longText("details3")->nullable();
            $table->longText("details4")->nullable();
            $table->longText("details5")->nullable();
            $table->longText("details6")->nullable();
            $table->longText("details7")->nullable();
            $table->longText("details8")->nullable();
            $table->longText("details9")->nullable();
            $table->longText("details10")->nullable();
            $table->longText("details11")->nullable();
            $table->longText("details12")->nullable();
            $table->longText("details13")->nullable();
            $table->longText("details14")->nullable();
            $table->longText("details15")->nullable();
            $table->longText("details16")->nullable();
            $table->longText("details17")->nullable();
            $table->longText("details18")->nullable();
            $table->longText("details19")->nullable();
            $table->longText("details20")->nullable();
            $table->boolean("active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_pages');
    }
};
