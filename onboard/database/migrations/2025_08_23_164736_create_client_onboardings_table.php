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
        Schema::create('client_onboardings', function (Blueprint $table) {
             $table->id();

             $table->unsignedBigInteger('user_id');

                $table->string('company_name')->nullable();
                $table->string('contact_person_name')->nullable();
                $table->string('contact_person_designation')->nullable();
                $table->string('contact_email')->unique();        /// পরে nullable করা হয়েছে।
                $table->string('contact_phone')->nullable();
                $table->string('alternative_phone')->nullable();
                $table->string('company_website')->nullable();
                $table->text('company_address')->nullable();
                $table->string('facebook_page')->nullable();
                $table->string('whatsapp_number', 15)->nullable();
                $table->date('submission_date')->nullable();
                $table->boolean('terms_agreement')->default(false);

                $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('client_onboardings');
    }
};