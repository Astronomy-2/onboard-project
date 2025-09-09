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
        Schema::create('client_project_budgets', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('client_id');


            $table->string('project_budget')->nullable();
            $table->text('budget_priorities')->nullable();
            $table->string('results_timeline')->nullable();
            $table->string('reporting_preference')->nullable();
            $table->text('future_products_services')->nullable();
            $table->text('tech_usage_plans')->nullable();
            $table->string('e_commerce_payment_experience')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('how_found_agency')->nullable();
            $table->text('questions_for_agency')->nullable();


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
        Schema::dropIfExists('client_project_budgets');
    }
};