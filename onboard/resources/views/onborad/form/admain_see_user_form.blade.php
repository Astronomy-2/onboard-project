<div class="container client-info" style="width:210mm; min-height:297mm; padding:20mm; margin:auto; background:#fff; box-shadow:0 0 5px rgba(0,0,0,0.1);">

<pre>
@if($client)
    {{ print_r($client->toArray()) }}
@else
    Client is null!
@endif
</pre>


    {{-- Print & Download Buttons --}}
    <div style="text-align:right; margin-bottom:20px;">
        <button onclick="window.print()" style="padding:8px 16px; background-color:#3490dc; color:#fff; border:none; border-radius:5px; cursor:pointer; margin-right:10px;">🖨 Print</button>
        <a href="{{ route('admin.client.show', $client->id ?? 0) }}" target="_blank" onclick="setTimeout(()=>window.print(),500); return false;" style="padding:8px 16px; background-color:#38c172; color:#fff; text-decoration:none; border-radius:5px;">⬇ Download PDF</a>
    </div>

    <h1 style="text-align:center; margin-bottom:30px;">ক্লায়েন্ট অনবোর্ডিং তথ্য</h1>

    @php
    $aud = $client->audiences ?? null;
    $bus = $client->businessDetails ?? null;
    $mark = $client->marketingDetails ?? null;
    $brand = $client->branding ?? null;
    $budget = $client->projectBudget ?? null;
    $competitors = $client->competitors ?? collect();
    $goals = $client->goals ?? collect();
@endphp


    {{-- পরিচিতি --}}
    <h3>পরিচিতি</h3>
    <p><strong>Company Name:</strong> {{ $client->company_name ?? 'No data available' }}</p>
    <p><strong>Contact Person:</strong> {{ $client->contact_person_name ?? 'No data available' }}</p>
    <p><strong>Designation:</strong> {{ $client->contact_person_designation ?? 'No data available' }}</p>
    <p><strong>Email:</strong> {{ $client->contact_email ?? 'No data available' }}</p>
    <p><strong>Phone:</strong> {{ $client->contact_phone ?? 'No data available' }}</p>
    <p><strong>Alternative Phone:</strong> {{ $client->alternative_phone ?? 'No data available' }}</p>
    <p><strong>WhatsApp Number:</strong> {{ $client->whatsapp_number ?? 'No data available' }}</p>
    <p><strong>Company Website:</strong> {{ $client->company_website ?? 'No data available' }}</p>
    <p><strong>Company Address:</strong> {{ $client->company_address ?? 'No data available' }}</p>
    <p><strong>Facebook Page:</strong> {{ $client->facebook_page ?? 'No data available' }}</p>

    {{-- ব্যবসা --}}
    <h3>ব্যবসা</h3>
    <p><strong>Business Type:</strong> {{ $bus->business_type ?? 'No data available' }}</p>
    <p><strong>Start Date:</strong> {{ $bus->business_start_date ?? 'No data available' }}</p>
    <p><strong>Details:</strong> {{ $bus->business_details ?? 'No data available' }}</p>
    <p><strong>Vision:</strong> {{ $bus->business_vision ?? 'No data available' }}</p>
    <p><strong>Mission:</strong> {{ $bus->business_mission ?? 'No data available' }}</p>
    <p><strong>Main Products/Services:</strong> {{ $bus->main_products_services ?? 'No data available' }}</p>
    <p><strong>Financial Status:</strong> {{ $bus->financial_status ?? 'No data available' }}</p>
    <p><strong>Popular Products:</strong> {{ $bus->popular_products ?? 'No data available' }}</p>
    <p><strong>Daily Commitment:</strong> {{ $bus->daily_time_commitment ?? 'No data available' }}</p>
    <p><strong>Core Values:</strong> {{ $bus->core_values ?? 'No data available' }}</p>
    <p><strong>Main Challenges:</strong> {{ $bus->main_challenges ?? 'No data available' }}</p>
    <p><strong>Agency Expectations:</strong> {{ $bus->agency_expectations ?? 'No data available' }}</p>

    {{-- Marketing --}}
    <h3>Marketing</h3>
    <p><strong>Current Activities:</strong> {{ $mark->current_marketing_activities ?? 'No data available' }}</p>
    <p><strong>Successful Activities:</strong> {{ $mark->successful_activities ?? 'No data available' }}</p>
    <p><strong>Less Successful Activities:</strong> {{ $mark->less_successful_activities ?? 'No data available' }}</p>
    <p><strong>Monthly Budget:</strong> {{ $mark->monthly_marketing_budget ?? 'No data available' }}</p>
    <p><strong>Ad Budget Allocation:</strong> {{ $mark->ad_budget_allocation ?? 'No data available' }}</p>
    <p><strong>In-House Team:</strong> {{ $mark->in_house_marketing_team ?? 'No data available' }}</p>
    <p><strong>Previous Agency Experience:</strong> {{ $mark->previous_agency_experience ?? 'No data available' }}</p>

    {{-- Branding --}}
    <h3>Branding</h3>
    <p><strong>Brand Personality:</strong> {{ $brand->brand_personality ?? 'No data available' }}</p>
    <p><strong>Marketing Materials:</strong> {{ $brand->existing_marketing_materials ?? 'No data available' }}</p>
    <p><strong>Content Themes:</strong> {{ $brand->content_themes_pillars ?? 'No data available' }}</p>
    <p><strong>Preferred Visuals:</strong> {{ $brand->preferred_visuals ?? 'No data available' }}</p>

    {{-- Goals --}}
    <h3>Goals</h3>
    @forelse($goals as $goal)
        <p>{{ $goal->goal ?? 'No data available' }}</p>
    @empty
        <p>No goals submitted</p>
    @endforelse

    {{-- Project Budget & Tech --}}
    <h3>Project Budget & Tech</h3>
    <p><strong>Budget:</strong> {{ $budget->project_budget ?? 'No data available' }}</p>
    <p><strong>Budget Priorities:</strong> {{ $budget->budget_priorities ?? 'No data available' }}</p>
    <p><strong>Results Timeline:</strong> {{ $budget->results_timeline ?? 'No data available' }}</p>
    <p><strong>Reporting Preference:</strong> {{ $budget->reporting_preference ?? 'No data available' }}</p>
    <p><strong>Future Products/Services:</strong> {{ $budget->future_products_services ?? 'No data available' }}</p>
    <p><strong>Tech Usage Plans:</strong> {{ $budget->tech_usage_plans ?? 'No data available' }}</p>
    <p><strong>Additional Info:</strong> {{ $budget->additional_info ?? 'No data available' }}</p>

    {{-- Competitors --}}
    <h3>Competitors</h3>
    @forelse($competitors as $competitor)
        <p><strong>Name:</strong> {{ $competitor->name ?? 'No data available' }}</p>
        <p><strong>Website:</strong> {{ $competitor->website ?? 'No data available' }}</p>
        <p><strong>Strengths & Weaknesses:</strong> {{ $competitor->strengths_weaknesses ?? 'No data available' }}</p>
        <p><strong>Marketing Likes:</strong> {{ $competitor->marketing_likes ?? 'No data available' }}</p>
        <p><strong>Differentiation:</strong> {{ $competitor->differentiation ?? 'No data available' }}</p>
        <p><strong>Target Audience:</strong> {{ $competitor->target_audience ?? 'No data available' }}</p>
        <p><strong>Pricing Strategy:</strong> {{ $competitor->pricing_strategy ?? 'No data available' }}</p>
        <p><strong>Customer Service:</strong> {{ $competitor->customer_service ?? 'No data available' }}</p>
        <p><strong>Market Share:</strong> {{ $competitor->market_share ?? 'No data available' }}</p>
        <hr>
    @empty
        <p>No competitors data</p>
    @endforelse

    {{-- Audience --}}
    <h3>Audience</h3>
    <p><strong>Age Range:</strong> {{ $aud->age_range ?? 'No data available' }}</p>
    <p><strong>Gender:</strong> {{ $aud->gender ?? 'No data available' }}</p>
    <p><strong>Location:</strong> {{ $aud->location ?? 'No data available' }}</p>
    <p><strong>Profession/Income:</strong> {{ $aud->profession_income ?? 'No data available' }}</p>
    <p><strong>Education:</strong> {{ $aud->education ?? 'No data available' }}</p>
    <p><strong>Interests:</strong> {{ $aud->interests ?? 'No data available' }}</p>
    <p><strong>Problems:</strong> {{ $aud->problems ?? 'No data available' }}</p>
    <p><strong>Social Media:</strong> {{ $aud->social_media ?? 'No data available' }}</p>
    <p><strong>Online Behavior:</strong> {{ $aud->online_behavior ?? 'No data available' }}</p>
    <p><strong>Devices:</strong> {{ $aud && $aud->devices ? implode(', ', (array)json_decode($aud->devices, true)) : 'No data available' }}</p>
    <p><strong>Purchase Influencers:</strong> {{ $aud->purchase_influencers ?? 'No data available' }}</p>
    <p><strong>Content Formats:</strong> {{ $aud && $aud->content_formats ? implode(', ', (array)json_decode($aud->content_formats, true)) : 'No data available' }}</p>

    <p><strong>Submission Date:</strong> {{ $client->submission_date ?? 'No data available' }}</p>
