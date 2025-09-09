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
        Schema::create('client_competitors', function (Blueprint $table) {
              $table->id();

            $table->unsignedBigInteger('client_id');

            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->text('strengths_weaknesses')->nullable();
            $table->text('marketing_likes')->nullable();
            $table->text('differentiation')->nullable();
            $table->text('target_audience')->nullable();
            $table->text('pricing_strategy')->nullable();
            $table->text('customer_service')->nullable();
            $table->text('market_share')->nullable();

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
        Schema::dropIfExists('client_competitors');
    }
};