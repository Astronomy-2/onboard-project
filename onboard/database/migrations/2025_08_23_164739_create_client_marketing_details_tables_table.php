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
        Schema::create('client_marketing_details_tables', function (Blueprint $table) {
             $table->id();

            $table->unsignedBigInteger('client_id');


            $table->text('current_marketing_activities')->nullable();
            $table->text('successful_activities')->nullable();
            $table->text('less_successful_activities')->nullable();
            $table->string('monthly_marketing_budget')->nullable();
            $table->text('ad_budget_allocation')->nullable();
            $table->text('in_house_marketing_team')->nullable();
            $table->text('previous_agency_experience')->nullable();
            $table->text('website_traffic_sources')->nullable();
            $table->text('email_marketing_list')->nullable();
            $table->text('social_media_engagement')->nullable();
            $table->text('cac_understanding')->nullable();
            $table->text('marketing_automation_tools')->nullable();

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
        Schema::dropIfExists('client_marketing_details_tables');
    }
};