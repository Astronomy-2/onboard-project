<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client_business_detail;
use App\Models\Client_marketing_details_table;
use App\Models\Client_branding;
use App\Models\Client_project_budget;
use App\Models\Client_goal;
use App\Models\Client_competitor;
use App\Models\Client_audiences;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Client_onboarding;


class ClientOnboardingController extends Controller
{
    public function create()
    {
        return view('onborad.form.index');
    }


    public function adminShow($id)
    {
        $client = Client_onboarding::with([
            'businessDetails',
            'marketingDetails',
            'branding',
            'projectBudget',
            'audiences',
            'competitors',
            'goals',
            'user'
        ])->find($id);
    
        if (!$client) {
            return redirect()->route('admin.dashboard')->with('error', 'Client data not found!');
        }
    dd($client);
       // return view('onborad.form.admain_see_user_form', compact('client'));
    }
    
    public function show($id)
    {
        $client = Client_onboarding::with([
            'businessDetails',
            'marketingDetails',
            'branding',
            'projectBudget',
            'audiences',
            'competitors',
            'goals',
            'user'
           
        ])->findOrFail($id);

       

        return view('onborad.form.showform', compact('client'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_email' => 'required|email|unique:client_onboardings,contact_email',

        ]);

        // -----------------------
        // Create main client
        // -----------------------
        $client = Client_onboarding::create([
            'company_name' => $request->company_name,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_designation' => $request->contact_person_designation,
            'contact_email' => $request->contact_email,
            'contact_phone' => $request->contact_phone,
            'alternative_phone' => $request->alternative_phone,
            'company_website' => $request->company_website,
            'company_address' => $request->company_address,
            'facebook_page' => $request->facebook_page,
            'whatsapp_number' => $request->whatsapp_number,
            'submission_date' => $request->submission_date,
             'user_id' => Auth::id() ?? null, // শুধু logged-in user id
        ]);

        $client_id = $client->id;

        // -----------------------
        // Related tables
        // -----------------------
        Client_business_detail::create(array_merge(
            $request->only([
                'business_type','business_start_date','business_details','business_vision',
                'business_mission','main_products_services','financial_status','popular_products',
                'daily_time_commitment','core_values','main_challenges','agency_expectations',
                'marketing_kpis','past_failures'
            ]), ['client_id' => $client_id]
        ));

        Client_marketing_details_table::create(array_merge(
            $request->only([
                'current_marketing_activities','successful_activities','less_successful_activities',
                'monthly_marketing_budget','ad_budget_allocation','in_house_marketing_team',
                'previous_agency_experience','website_traffic_sources','email_marketing_list',
                'social_media_engagement','cac_understanding','marketing_automation_tools'
            ]), ['client_id' => $client_id]
        ));

        Client_branding::create(array_merge(
            $request->only([
                'brand_personality','existing_marketing_materials','brand_tone_of_voice',
                'content_themes_pillars','preferred_visuals'
            ]), ['client_id' => $client_id]
        ));

        Client_project_budget::create(array_merge(
            $request->only([
                'project_budget','budget_priorities','results_timeline','reporting_preference',
                'future_products_services','tech_usage_plans','e_commerce_payment_experience',
                'additional_info','how_found_agency','questions_for_agency'
            ]), ['client_id' => $client_id]
        ));

        if($request->has('goals')){
            foreach($request->goals as $goal){
                if($goal) Client_goal::create(['client_id'=>$client_id,'goal'=>$goal]);
            }
        }

        if($request->has('competitors')){
            foreach($request->competitors as $competitor){
                if($competitor) Client_competitor::create(['client_id'=>$client_id,'name'=>$competitor]);
            }
        }

        Client_audiences::create([
            'client_id' => $client_id,
            'age_range' => $request->audience_age_range,
            'gender' => $request->audience_gender,
            'location' => $request->audience_location,
            'profession_income' => $request->audience_profession_income,
            'education' => $request->audience_education,
            'interests' => $request->audience_interests,
            'problems' => $request->audience_problems,
            'social_media' => $request->audience_social_media,
            'online_behavior' => $request->audience_online_behavior,
            'purchase_influencers' => $request->audience_purchase_influencers,
            'devices' => json_encode($request->devices ?? []),
            'content_formats' => json_encode($request->audience_content_format ?? []),
        ]);

        return response()->json(['success' => true]);
    }
}