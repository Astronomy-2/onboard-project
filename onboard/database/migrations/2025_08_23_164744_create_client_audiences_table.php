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
        Schema::create('client_audiences', function (Blueprint $table) {
             $table->id();

                   $table->unsignedBigInteger('client_id');


            $table->string('age_range')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->string('profession_income')->nullable();
            $table->string('education')->nullable();
            $table->text('interests')->nullable();
            $table->text('problems')->nullable();
            $table->string('social_media')->nullable();
            $table->text('online_behavior')->nullable();
            $table->json('devices')->nullable();   // multiple selection
            $table->text('purchase_influencers')->nullable();
            $table->json('content_formats')->nullable();

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
        Schema::dropIfExists('client_audiences');
    }
};