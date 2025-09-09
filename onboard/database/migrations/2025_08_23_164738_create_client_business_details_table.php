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
        Schema::create('client_business_details', function (Blueprint $table) {

    $table->id();

    $table->unsignedBigInteger('client_id');   //foreign key

    $table->string('business_type')->nullable();
    $table->string('business_start_date')->nullable();
    $table->text('business_details')->nullable();
    $table->text('business_vision')->nullable();
    $table->text('business_mission')->nullable();
    $table->text('main_products_services')->nullable();
    $table->text('financial_status')->nullable();
    $table->text('popular_products')->nullable();
    $table->string('daily_time_commitment')->nullable();
    $table->text('core_values')->nullable();
    $table->text('main_challenges')->nullable();
    $table->text('agency_expectations')->nullable();
    $table->text('marketing_kpis')->nullable();
    $table->text('past_failures')->nullable();

    //Relationship

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
        Schema::dropIfExists('client_business_details');
    }
};
