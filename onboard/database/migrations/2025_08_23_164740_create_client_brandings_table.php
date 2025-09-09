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
        Schema::create('client_brandings', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('client_id');


            $table->string('brand_personality')->nullable();
            $table->text('existing_marketing_materials')->nullable();
            $table->string('brand_tone_of_voice')->nullable();
            $table->text('content_themes_pillars')->nullable();
            $table->text('preferred_visuals')->nullable();

                 $table->foreign('client_id')->references('id')->on('client_onboardings')
                    ->cascadeOnUpdate()->restrictOnDelete();

              $table->timestamp('created_at')->useCurrent();
              $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_brandings');
    }
};