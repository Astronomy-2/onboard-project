<!DOCTYPE html>
<html lang="bn">


        @extends('onborad.form.formhead')



<body>





    <div class="container">

    <a href="{{ route('user.dashboard') }}" class="exit-btn" style="
        padding: 8px 16px;
        background-color: #289b69;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;

    ">
        ফর্ম থেকে বের হও
    </a>


        <div class="form-header">


            <h1><i class="fas fa-file-signature"></i> ক্লায়েন্ট অনবোর্ডিং ফরম</h1>




        </div>

        <ul class="progress-bar">
            <li class="step active" data-step="1" data-step-title="পরিচিতি"><span class="step-text">পরিচিতি</span></li>
            <li class="step" data-step="2" data-step-title="ব্যবসা"><span class="step-text">ব্যবসা</span></li>
            <li class="step" data-step="3" data-step-title="লক্ষ্য"><span class="step-text">লক্ষ্য</span></li>
            <li class="step" data-step="4" data-step-title="গ্রাহক ও প্রতিযোগী"><span class="step-text">গ্রাহক ও প্রতিযোগী</span></li>
            <li class="step" data-step="5" data-step-title="মার্কেটিং"><span class="step-text">মার্কেটিং</span></li>
            <li class="step" data-step="6" data-step-title="বাজেট ও প্রযুক্তি"><span class="step-text">বাজেট ও প্রযুক্তি</span></li>
            <li class="step" data-step="7" data-step-title="চূড়ান্তর"><span class="step-text">চূড়ান্তর</span></li>
        </ul>


        <div class="mobile-progress-info"></div>

   <form id="clientOnboardingForm"
      action="{{ route('client.store') }}"
      method="POST"
      novalidate>
    @csrf
       <!---===========================================================================-->

                <div class="form-step active-step" data-step="1">
                    <h2 class="section-title"><i class="fas fa-play-circle"></i> ধাপ ১: প্রাথমিক পরিচিতি</h2>
                    <p>আপনার এবং আপনার ব্যবসা সম্পর্কে কিছু মৌলিক তথ্য দিন।</p>

                    <div class="input-group">
                        <label for="company_name"><i class="fas fa-building label-icon"></i> প্রতিষ্ঠানের নাম:</label>
                        <input type="text" id="company_name" name="company_name" placeholder="আপনার প্রতিষ্ঠানের সম্পূর্ণ নাম" value="{{ old('company_name') }}" required>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-user-tie label-icon"></i> প্রধান যোগাযোগকারী:</label>
                        <input type="text" name="contact_person_name" placeholder="নাম" value="{{ old('contact_person_name') }}" required style="margin-bottom: 10px;">
                        <input type="text" name="contact_person_designation" placeholder="পদবি" value="{{ old('contact_person_designation') }}" required>
                    </div>

                    <div class="input-group">
                        <label for="contact_email"><i class="fas fa-envelope label-icon"></i> যোগাযোগের ইমেইল:</label>
                        <input type="email" id="contact_email" name="contact_email" placeholder="সঠিক ইমেইল ঠিকানা দিন"  value="{{ old('contact_email', auth()->user()->email ?? '') }}"  required>
                    </div>

                    <div class="input-group">
                        <label for="contact_phone"><i class="fas fa-phone label-icon"></i> যোগাযোগের ফোন:</label>
                        <input type="tel" id="contact_phone" name="contact_phone" placeholder="ফোন নম্বর দিন" value="{{ old('contact_phone') }}" required>
                    </div>

                    <div class="input-group">
                        <label for="alternative_phone"><i class="fas fa-mobile-alt label-icon"></i> বিকল্প ফোন (যদি থাকে):</label>
                        <input type="tel" id="contact_alternative_phone" name="alternative_phone"" placeholder="বিকল্প ফোন নম্বর" value="{{ old('alternative_phone') }}">
                    </div>
                </div>


<!---===========================================================================-->

                        <div class="form-step" data-step="2">
                            <h2 class="section-title"><i class="fas fa-briefcase"></i> ধাপ ২: ব্যবসার বিস্তারিত</h2>
                            <p>আপনার ব্যবসার কাঠামো, কার্যক্রম এবং প্রধান দিকগুলো সম্পর্কে জানান।</p>

                            <div class="input-group">
                                <label for="company_website"><i class="fas fa-globe label-icon"></i> প্রতিষ্ঠানের ওয়েবসাইট:</label>
                                <input type="url" id="company_website" name="company_website" placeholder="https://www.example.com" value="{{ old('company_website') }}">
                            </div>

                            <div class="input-group">
                                <label for="facebook_page"><i class="fab fa-facebook-square label-icon"></i> Facebook পেজের লিঙ্ক:</label>
                                <input type="url" id="facebook_page" name="facebook_page" placeholder="https://www.facebook.com/yourpage" value="{{ old('facebook_page') }}" required>
                            </div>

                            <div class="input-group">
                                <label for="whatsapp_number"><i class="fab fa-whatsapp label-icon"></i> WhatsApp নম্বর (১১ সংখ্যা):</label>
                                <input type="tel" id="whatsapp_number" name="whatsapp_number" placeholder="সঠিক ১১ সংখ্যার WhatsApp নম্বর দিন" value="{{ old('whatsapp_number') }}" required>
                            </div>

                            <div class="input-group">
                                <label for="company_address"><i class="fas fa-map-marker-alt label-icon"></i> প্রতিষ্ঠানের ঠিকানা:</label>
                                <textarea id="company_address" name="company_address" placeholder="সম্পূর্ণ ঠিকানা লিখুন (বাসা/হোল্ডিং, রোড, এলাকা, শহর, পোস্ট কোড)">{{ old('company_address') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label for="business_type"><i class="fas fa-briefcase label-icon"></i> ব্যবসার ধরণ:</label>
                                <select id="business_type" name="business_type" required>
                                    <option value="">-- নির্বাচন করুন --</option>
                                    <option value="Sole Proprietorship">একক মালিকানা (Sole Proprietorship)</option>
                                    <option value="Partnership">পার্টনারশিপ (Partnership)</option>
                                    <option value="Private Limited">প্রাইভেট লিমিটেড কোম্পানি</option>
                                    <option value="Public Limited">পাবলিক লিমিটেড কোম্পানি</option>
                                    <option value="NGO">এনজিও/অলাভজনক সংস্থা</option>
                                    <option value="Other">অন্যান্য</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="business_start_date"><i class="fas fa-calendar-check label-icon"></i> ব্যবসা শুরুর তারিখ/বছর:</label>
                                <input type="text" id="business_start_date" name="business_start_date" placeholder="যেমন: জানুয়ারি ২০১৫ বা ১৫/০১/২০১৫" value="{{ old('business_start_date') }}">
                            </div>

                            <div class="input-group">
                                <label for="business_details"><i class="fas fa-align-left label-icon"></i> আপনার ব্যবসা সম্পর্কে বিস্তারিত বলুন:</label>
                                <textarea id="business_details" name="business_details" placeholder="আপনারা কী করেন, কাদের জন্য করেন এবং কীভাবে করেন?" required>{{ old('business_details') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label for="main_products_services"><i class="fas fa-cubes label-icon"></i> আপনার প্রধান পণ্য বা সেবাগুলো:</label>
                                <textarea id="main_products_services" name="main_products_services" placeholder="যদি একাধিক থাকে, কমা দিয়ে তালিকা দিন" required>{{ old('main_products_services') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label for="financial_status"><i class="fas fa-hand-holding-usd label-icon"></i> বর্তমান আর্থিক অবস্থা (সংক্ষেপে):</label>
                                <textarea id="financial_status" name="financial_status" placeholder="ব্যবসার বর্তমান আর্থিক অবস্থা কেমন?" required>{{ old('financial_status') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label for="popular_products"><i class="fas fa-chart-pie label-icon"></i> আপনার জনপ্রিয়/বেশি বিক্রিত পণ্য কোনটি?:</label>
                                <textarea id="popular_products" name="popular_products" placeholder="আপনার সবচেয়ে বেশি বিক্রিত পণ্যগুলি উল্লেখ করুন">{{ old('popular_products') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label for="daily_time_commitment"><i class="fas fa-clock label-icon"></i> প্রতিদিন ব্যবসায় কেমন সময় দিতে পারবেন?</label>
                                <input type="text" id="daily_time_commitment" name="daily_time_commitment" placeholder="যেমন: ৪-৫ ঘণ্টা" value="{{ old('daily_time_commitment') }}">
                            </div>
                        </div>

        <!---===========================================================================-->

                    <div class="form-step" data-step="3">
                        <h2 class="section-title"><i class="fas fa-flag-checkered"></i> ধাপ ৩: লক্ষ্য ও উদ্দেশ্য</h2>
                        <p>আপনার ব্যবসার ভিশন, মিশন এবং আমাদের সাথে কাজ করে কী অর্জন করতে চান তা জানান।</p>

                        <div class="input-group">
                            <label for="business_vision"><i class="fas fa-binoculars label-icon"></i> আপনার ব্যবসার ভিশন (Vision):</label>
                            <textarea id="business_vision" name="business_vision" placeholder="দীর্ঘমেয়াদে আপনার ব্যবসাকে কোথায় দেখতে চান?" required>{{ old('business_vision') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="business_mission"><i class="fas fa-bullseye label-icon"></i> আপনার ব্যবসার মিশন (Mission):</label>
                            <textarea id="business_mission" name="business_mission" placeholder="ভিশন অর্জনের জন্য আপনারা বর্তমানে কী করছেন?">{{ old('business_mission') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="core_values"><i class="fas fa-gem label-icon"></i> আপনার ব্যবসার মূল্যবোধ (Core Values):</label>
                            <textarea id="core_values" name="core_values" placeholder="আপনার ব্যবসার প্রধান কয়েকটি মূল্যবোধ উল্লেখ করুন">{{ old('core_values') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="main_challenges"><i class="fas fa-exclamation-triangle label-icon"></i> আপনার ব্যবসার প্রধান চ্যালেঞ্জগুলো কী কী?</label>
                            <textarea id="main_challenges" name="main_challenges" placeholder="বর্তমানে কোন কোন প্রধান বাধার সম্মুখীন হচ্ছেন?">{{ old('main_challenges') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label><i class="fas fa-list-ol label-icon"></i> আগামী ৬-১২ মাসের মধ্যে আপনার ব্যবসার প্রধান লক্ষ্যগুলো:</label>
                            <div id="goals_container">
                                <div class="dynamic-item-group">
                                    <input type="text" name="goals[]" placeholder="প্রথম লক্ষ্য">
                                </div>
                            </div>
                            <button type="button" class="add-more-btn" onclick="addGoalField()"><i class="fas fa-plus-circle"></i> আরও লক্ষ্য যুক্ত করুন</button>
                        </div>

                        <div class="input-group">
                            <label for="agency_expectations"><i class="fas fa-handshake label-icon"></i> আমাদের এজেন্সি থেকে আপনার প্রধান প্রত্যাশাগুলো:</label>
                            <textarea id="agency_expectations" name="agency_expectations" placeholder="আমাদের কাছ থেকে কী ধরনের ফলাফল বা সহায়তা আশা করছেন?">{{ old('agency_expectations') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="marketing_kpis"><i class="fas fa-chart-line label-icon"></i> আপনি কি কোনো নির্দিষ্ট মার্কেটিং লক্ষ্য (KPIs) পরিমাপ করতে চান?</label>
                            <textarea id="marketing_kpis" name="marketing_kpis" placeholder="যেমন: ওয়েবসাইটে মাসিক ভিজিটর সংখ্যা, লিড জেনারেশন সংখ্যা, কনভার্সন রেট ইত্যাদি">{{ old('marketing_kpis') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="past_failures"><i class="fas fa-history label-icon"></i> অতীতে কোনো মার্কেটিং লক্ষ্য অর্জনে ব্যর্থ হয়েছেন কি? হলে, তার কারণ কী?</label>
                            <textarea id="past_failures" name="past_failures" placeholder="ব্যর্থতার কারণ এবং আপনার পর্যবেক্ষণ">{{ old('past_failures') }}</textarea>
                        </div>
                    </div>

<!---===========================================================================-->

            <div class="form-step" data-step="4">
                <h2 class="section-title"><i class="fas fa-users"></i> ধাপ ৪: টার্গেট অডিয়েন্স ও প্রতিযোগী</h2>
                <p>আপনার আদর্শ গ্রাহক কারা এবং বাজারে আপনার প্রধান প্রতিযোগী কারা?</p>

                <h3 class="sub-title"><i class="fas fa-user-circle"></i> টার্গেট অডিয়েন্স</h3>

                <div class="input-group">
                    <label for="audience_age_range"><i class="far fa-calendar-alt label-icon"></i> বয়সসীমা:</label>
                    <input type="text" id="audience_age_range" name="audience_age_range" placeholder="যেমন: ২৫-৪৫ বছর" value="{{ old('audience_age_range') }}">
                </div>

                <div class="input-group">
                    <label><i class="fas fa-venus-mars label-icon"></i> লিঙ্গ:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="audience_gender" value="পুরুষ"> পুরুষ</label>
                        <label><input type="radio" name="audience_gender" value="মহিলা"> মহিলা</label>
                        <label><input type="radio" name="audience_gender" value="উভয়"> উভয়</label>
                        <label><input type="radio" name="audience_gender" value="উল্লেখ_করতে_চাই_না"> উল্লেখ করতে চাই না</label>
                    </div>
                </div>

                <div class="input-group">
                    <label for="audience_location"><i class="fas fa-map-pin label-icon"></i> ভৌগোলিক অবস্থান:</label>
                    <input type="text" id="audience_location" name="audience_location" placeholder="যেমন: ঢাকা শহর, বা নির্দিষ্ট এলাকা" value="{{ old('audience_location') }}">
                </div>

                <div class="input-group">
                    <label for="audience_profession_income"><i class="fas fa-briefcase label-icon"></i> পেশা/আয়ের স্তর:</label>
                    <input type="text" id="audience_profession_income" name="audience_profession_income" placeholder="যেমন: চাকুরীজীবী, ব্যবসায়ী, মধ্যম আয়" value="{{ old('audience_profession_income') }}">
                </div>

                <div class="input-group">
                    <label for="audience_education"><i class="fas fa-graduation-cap label-icon"></i> শিক্ষা:</label>
                    <input type="text" id="audience_education" name="audience_education" placeholder="যেমন: স্নাতক, স্নাতকোত্তর" value="{{ old('audience_education') }}">
                </div>

                <div class="input-group">
                    <label for="audience_interests"><i class="fas fa-heart label-icon"></i> আগ্রহ ও শখ:</label>
                    <textarea id="audience_interests" name="audience_interests" placeholder="যেমন: ভ্রমণ, প্রযুক্তি, বই পড়া">{{ old('audience_interests') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="audience_problems"><i class="fas fa-comment-dots label-icon"></i> তারা কোন ধরনের সমস্যার সম্মুখীন হয় যা আপনার পণ্য/সেবা সমাধান করতে পারে?</label>
                    <textarea id="audience_problems" name="audience_problems" placeholder="তাদের প্রধান সমস্যাগুলো কী?">{{ old('audience_problems') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="audience_social_media"><i class="fab fa-sourcetree label-icon"></i> তারা সাধারণত কোন সোশ্যাল মিডিয়া প্ল্যাটফর্ম ব্যবহার করে?</label>
                    <input type="text" id="audience_social_media" name="audience_social_media" placeholder="যেমন: ফেসবুক, ইনস্টাগ্রাম, ইউটিউব, লিংকডইন" value="{{ old('audience_social_media') }}">
                </div>

                <div class="input-group">
                    <label for="audience_online_behavior"><i class="fas fa-mouse-pointer label-icon"></i> তাদের অনলাইন আচরণের ধরণ কেমন?</label>
                    <textarea id="audience_online_behavior" name="audience_online_behavior" placeholder="যেমন: তারা কি অনলাইনে কেনাকাটা করে, রিভিউ পড়ে, নাকি তথ্য খোঁজে?">{{ old('audience_online_behavior') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="multiple_target_audiences"><i class="fas fa-users-slash label-icon"></i> আপনার কি একাধিক ধরনের টার্গেট অডিয়েন্স আছে?</label>
                    <textarea id="multiple_target_audiences" name="multiple_target_audiences" placeholder="থাকলে, তাদের সম্পর্কে সংক্ষেপে বলুন">{{ old('multiple_target_audiences') }}</textarea>
                </div>

                <div class="input-group">
                    <label><i class="fas fa-mobile-alt label-icon"></i> আপনার গ্রাহকরা সাধারণত কোন ডিভাইস ব্যবহার করে অনলাইন ব্রাউজ করে?</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="audience_devices[]" value="মোবাইল"> মোবাইল</label>
                        <label><input type="checkbox" name="audience_devices[]" value="ল্যাপটপ"> ল্যাপটপ</label>
                        <label><input type="checkbox" name="audience_devices[]" value="ডেস্কটপ"> ডেস্কটপ</label>
                        <label><input type="checkbox" name="audience_devices[]" value="ট্যাবলেট"> ট্যাবলেট</label>
                    </div>
                </div>

                <div class="input-group">
                    <label for="audience_purchase_influencers"><i class="fas fa-balance-scale label-icon"></i> আপনার গ্রাহকদের ক্রয় সিদ্ধান্তকে কোন বিষয়গুলো সবচেয়ে বেশি প্রভাবিত করে?</label>
                    <textarea id="audience_purchase_influencers" name="audience_purchase_influencers" placeholder="যেমন: দাম, গুণমান, রিভিউ, ব্র্যান্ড পরিচিতি, বন্ধুর সুপারিশ">{{ old('audience_purchase_influencers') }}</textarea>
                </div>

                <div class="input-group">
                    <label><i class="fas fa-photo-video label-icon"></i> আপনার গ্রাহকদের পছন্দের কনটেন্ট ফরম্যাট কী?</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="audience_content_format[]" value="ভিডিও"> ভিডিও</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="ব্লগ_পোস্ট"> ব্লগ পোস্ট</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="ইনফোগ্রাফিক"> ইনফোগ্রাফিক</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="পডকাস্ট"> পডকাস্ট</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="ছবি"> ছবি</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="কেস_স্টাডি"> কেস স্টাডি</label>
                        <label><input type="checkbox" name="audience_content_format[]" value="ওয়েবিনার"> ওয়েবিনার</label>
                    </div>
                </div>

                <h3 class="sub-title"><i class="fas fa-search-dollar"></i> প্রতিযোগী বিশ্লেষণ</h3>

                <div class="input-group">
                    <label><i class="fas fa-users label-icon"></i> আপনার প্রধান প্রতিযোগী কারা?</label>
                    <div id="competitors_container">
                        <div class="dynamic-item-group">
                            <input type="text" name="competitors_name[]" placeholder="প্রতিযোগীর নাম" style="margin-bottom: 5px;">
                            <input type="url" name="competitors_website[]" placeholder="ওয়েবসাইট (https://example.com)">
                        </div>
                    </div>
                    <button type="button" class="add-more-btn" onclick="addCompetitorField()"><i class="fas fa-user-plus"></i> আরও প্রতিযোগী যুক্ত করুন</button>
                </div>

                <div class="input-group">
                    <label for="competitor_strengths_weaknesses"><i class="fas fa-thumbs-up label-icon"></i><i class="fas fa-thumbs-down label-icon" style="margin-left:-5px;"></i> প্রতিযোগীদের প্রধান শক্তি ও দুর্বলতাগুলো:</label>
                    <textarea id="competitor_strengths_weaknesses" name="competitor_strengths_weaknesses" placeholder="প্রতিযোগীদের শক্তি এবং দুর্বলতার দিকগুলো উল্লেখ করুন">{{ old('competitor_strengths_weaknesses') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="competitor_marketing_likes"><i class="far fa-lightbulb label-icon"></i> তাদের মার্কেটিং কার্যক্রমের কোন দিকগুলো আপনার ভালো লাগে বা আপনি অনুসরণ করতে চান?</label>
                    <textarea id="competitor_marketing_likes" name="competitor_marketing_likes" placeholder="তাদের কোন মার্কেটিং কৌশল আপনার পছন্দ?">{{ old('competitor_marketing_likes') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="product_differentiation"><i class="fas fa-star label-icon"></i> আপনার পণ্য/সেবা প্রতিযোগীদের থেকে কীভাবে আলাদা বা উন্নত?</label>
                    <textarea id="product_differentiation" name="product_differentiation" placeholder="আপনার বিশেষত্ব কী?">{{ old('product_differentiation') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="competitor_target_audience"><i class="fas fa-eye label-icon"></i> প্রতিযোগীদের টার্গেট অডিয়েন্স:</label>
                    <textarea id="competitor_target_audience" name="competitor_target_audience" placeholder="আপনার প্রতিযোগীরা কাদের টার্গেট করে বলে আপনি মনে করেন?">{{ old('competitor_target_audience') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="competitor_pricing_strategy"><i class="fas fa-tags label-icon"></i> প্রতিযোগীদের মূল্য নির্ধারণ কৌশল:</label>
                    <textarea id="competitor_pricing_strategy" name="competitor_pricing_strategy" placeholder="তাদের মূল্য নির্ধারণ কৌশল সম্পর্কে আপনার পর্যবেক্ষণ কী?">{{ old('competitor_pricing_strategy') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="competitor_customer_service"><i class="fas fa-comments label-icon"></i> প্রতিযোগীদের গ্রাহক সেবা:</label>
                    <textarea id="competitor_customer_service" name="competitor_customer_service" placeholder="তাদের গ্রাহক সেবা সম্পর্কে আপনি কী জানেন বা শুনেছেন?">{{ old('competitor_customer_service') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="competitor_market_share"><i class="fas fa-chart-area label-icon"></i> মার্কেট শেয়ার (আনুমানিক):</label>
                    <textarea id="competitor_market_share" name="competitor_market_share" placeholder="আপনার প্রধান প্রতিযোগীদের আনুমানিক মার্কেট শেয়ার কেমন?">{{ old('competitor_market_share') }}</textarea>
                </div>
            </div>



<!---===========================================================================-->



                <div class="form-step" data-step="5">
                    <h2 class="section-title"><i class="fas fa-bullhorn"></i> ধাপ ৫: মার্কেটিং ও ব্র্যান্ডিং</h2>
                    <p>আপনার বর্তমান মার্কেটিং কৌশল, বাজেট এবং ব্র্যান্ডের পরিচিতি সম্পর্কে তথ্য দিন।</p>

                    <h3 class="sub-title"><i class="fas fa-tasks"></i> বর্তমান মার্কেটিং কার্যক্রম</h3>
                    <div class="input-group">
                        <label for="current_marketing_activities"><i class="fas fa-tasks label-icon"></i> আপনি বর্তমানে কী কী মার্কেটিং কার্যক্রম পরিচালনা করছেন?</label>
                        <textarea id="current_marketing_activities" name="current_marketing_activities" placeholder="যেমন: ফেসবুক মার্কেটিং, গুগল অ্যাডস, এসইও, ইমেইল মার্কেটিং, কনটেন্ট মার্কেটিং ইত্যাদি">{{ old('current_marketing_activities') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-check-double label-icon"></i> এই কার্যক্রমগুলোর মধ্যে কোনটি সবচেয়ে সফল এবং কোনটি কম সফল হয়েছে? কেন?</label>
                        <label for="successful_activities" style="font-weight:normal; margin-top:10px;">সফল কার্যক্রম ও কারণ:</label>
                        <textarea id="successful_activities" name="successful_activities" placeholder="সফল কার্যক্রম এবং তার কারণ">{{ old('successful_activities') }}</textarea>
                        <label for="less_successful_activities" style="font-weight:normal;">কম সফল কার্যক্রম ও কারণ:</label>
                        <textarea id="less_successful_activities" name="less_successful_activities" placeholder="কম সফল কার্যক্রম এবং তার কারণ">{{ old('less_successful_activities') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="monthly_marketing_budget"><i class="fas fa-wallet label-icon"></i> আপনার বর্তমান মাসিক মার্কেটিং বাজেট কত?</label>
                        <input type="text" id="monthly_marketing_budget" name="monthly_marketing_budget" placeholder="যদি নির্দিষ্ট থাকে, আনুমানিক পরিমাণ উল্লেখ করুন" value="{{ old('monthly_marketing_budget') }}">
                    </div>

                    <div class="input-group">
                        <label for="ad_budget_allocation"><i class="fas fa-ad label-icon"></i> বিজ্ঞাপন বাজেট বন্টন:</label>
                        <textarea id="ad_budget_allocation" name="ad_budget_allocation" placeholder="বর্তমানে বিজ্ঞাপনের বাজেট বিভিন্ন চ্যানেলে কীভাবে বন্টন করা হয়? (যেমন: ফেসবুক ৭০%, গুগল ৩০%)">{{ old('ad_budget_allocation') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="in_house_marketing_team"><i class="fas fa-users-cog label-icon"></i> আপনার কি কোনো ইন-হাউস মার্কেটিং টিম বা ব্যক্তি আছে? থাকলে, তাদের ভূমিকা কী?</label>
                        <textarea id="in_house_marketing_team" name="in_house_marketing_team" placeholder="টিম সদস্য এবং তাদের দায়িত্ব">{{ old('in_house_marketing_team') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="previous_agency_experience"><i class="far fa-handshake label-icon"></i> আপনি কি আগে কোনো মার্কেটিং এজেন্সি বা ফ্রিল্যান্সারের সাথে কাজ করেছেন? অভিজ্ঞতা কেমন ছিল?</label>
                        <textarea id="previous_agency_experience" name="previous_agency_experience" placeholder="পূর্ববর্তী অভিজ্ঞতা (ভালো/মন্দ) এবং কারণ">{{ old('previous_agency_experience') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-tools label-icon"></i> আপনার কি কোনো মার্কেটিং অ্যানালিটিক্স টুল ইনস্টল করা আছে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="analytics_tool_installed" value="Yes" onclick="toggleConditionalField('analytics_tool_details', true)"> হ্যাঁ</label>
                            <label><input type="radio" name="analytics_tool_installed" value="No" onclick="toggleConditionalField('analytics_tool_details', false)"> না</label>
                        </div>
                        <div id="analytics_tool_details" class="conditional-field">
                            <label for="analytics_tool_name" style="font-weight:normal;">থাকলে, কোন টুলস?</label>
                            <input type="text" id="analytics_tool_name" name="analytics_tool_name" placeholder="Google Analytics, Facebook Pixel ইত্যাদি" value="{{ old('analytics_tool_name') }}">
                        </div>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-headset label-icon"></i> আপনি কি বর্তমানে কোনো CRM সিস্টেম ব্যবহার করেন?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="crm_system_used" value="Yes" onclick="toggleConditionalField('crm_system_details', true)"> হ্যাঁ</label>
                            <label><input type="radio" name="crm_system_used" value="No" onclick="toggleConditionalField('crm_system_details', false)"> না</label>
                        </div>
                        <div id="crm_system_details" class="conditional-field">
                            <label for="crm_system_name" style="font-weight:normal;">থাকলে, কোনটি?</label>
                            <input type="text" id="crm_system_name" name="crm_system_name" placeholder="HubSpot, Zoho CRM ইত্যাদি" value="{{ old('crm_system_name') }}">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="website_traffic_sources"><i class="fas fa-traffic-light label-icon"></i> আপনার ওয়েবসাইটের বর্তমান ট্র্যাফিক সোর্সগুলো কী কী?</label>
                        <textarea id="website_traffic_sources" name="website_traffic_sources" placeholder="যেমন: অর্গানিক সার্চ, সোশ্যাল মিডিয়া, ডিরেক্ট, রেফারেল, পেইড অ্যাডস">{{ old('website_traffic_sources') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="email_marketing_list"><i class="fas fa-envelope-open-text label-icon"></i> ইমেইল মার্কেটিং লিস্ট:</label>
                        <textarea id="email_marketing_list" name="email_marketing_list" placeholder="আপনার কি কোনো ইমেইল লিস্ট আছে? থাকলে তার আকার এবং কীভাবে সংগ্রহ করা হয়েছে?">{{ old('email_marketing_list') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="social_media_engagement"><i class="fas fa-share-alt label-icon"></i> সোশ্যাল মিডিয়া এনগেজমেন্ট:</label>
                        <textarea id="social_media_engagement" name="social_media_engagement" placeholder="আপনার সোশ্যাল মিডিয়াতে ফলোয়ার সংখ্যা এবং গড় এনগেজমেন্ট (লাইক, কমেন্ট, শেয়ার) কেমন?">{{ old('social_media_engagement') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="cac_understanding"><i class="fas fa-comments-dollar label-icon"></i> কাস্টমার অ্যাকুইজিশন কস্ট (CAC) সম্পর্কে ধারণা:</label>
                        <textarea id="cac_understanding" name="cac_understanding" placeholder="একজন নতুন গ্রাহক পেতে আনুমানিক কত খরচ হয়, সে সম্পর্কে কোনো ধারণা আছে কি?">{{ old('cac_understanding') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="marketing_automation_tools"><i class="fas fa-sync-alt label-icon"></i> মার্কেটিং অটোমেশন টুলস:</label>
                        <textarea id="marketing_automation_tools" name="marketing_automation_tools" placeholder="কোনো মার্কেটিং অটোমেশন টুলস ব্যবহার করেন কি? যেমন: HubSpot, Mailchimp অটোমেশন">{{ old('marketing_automation_tools') }}</textarea>
                    </div>

                    <h3 class="sub-title"><i class="fas fa-palette"></i> ব্র্যান্ডিং ও কনটেন্ট</h3>

                    <div class="input-group">
                        <label><i class="fas fa-book-reader label-icon"></i> আপনার কি কোনো ব্র্যান্ড গাইডলাইন (Brand Guideline) আছে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="brand_guideline" value="Yes"> হ্যাঁ (থাকলে শেয়ার করুন)</label>
                            <label><input type="radio" name="brand_guideline" value="No"> না</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="brand_personality"><i class="fas fa-theater-masks label-icon"></i> আপনার ব্র্যান্ডের ব্যক্তিত্ব (Brand Personality) কেমন?</label>
                        <input type="text" id="brand_personality" name="brand_personality" placeholder="যেমন: বন্ধুত্বপূর্ণ, প্রফেশনাল, উদ্ভাবনী, নির্ভরযোগ্য ইত্যাদি" value="{{ old('brand_personality') }}">
                    </div>

                    <div class="input-group">
                        <label for="existing_marketing_materials"><i class="fas fa-folder-open label-icon"></i> আপনার কি বিদ্যমান কোনো মার্কেটিং উপকরণ বা কনটেন্ট আছে?</label>
                        <textarea id="existing_marketing_materials" name="existing_marketing_materials" placeholder="যেমন: ব্রোশিওর, ব্লগ পোস্ট, ভিডিও, সোশ্যাল মিডিয়া পোস্ট ইত্যাদি (থাকলে লিঙ্ক বা স্যাম্পল দিন)">{{ old('existing_marketing_materials') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-blog label-icon"></i> আপনার ওয়েবসাইটে কি ব্লগ সেকশন আছে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="website_blog_status" value="Yes" onclick="toggleConditionalField('blog_frequency_details', true)"> হ্যাঁ</label>
                            <label><input type="radio" name="website_blog_status" value="No" onclick="toggleConditionalField('blog_frequency_details', false)"> না</label>
                        </div>
                        <div id="blog_frequency_details" class="conditional-field">
                            <label for="blog_post_frequency" style="font-weight:normal;">আপনি কি নিয়মিত কনটেন্ট প্রকাশ করেন? থাকলে, কতদিন পর পর?</label>
                            <input type="text" id="blog_post_frequency" name="blog_post_frequency" placeholder="যেমন: সাপ্তাহিক, মাসিক" value="{{ old('blog_post_frequency') }}">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="brand_tone_of_voice"><i class="fas fa-microphone-alt label-icon"></i> আপনার ব্র্যান্ডের টোন অফ ভয়েস কেমন হওয়া উচিত?</label>
                        <input type="text" id="brand_tone_of_voice" name="brand_tone_of_voice" placeholder="যেমন: ফরমাল, ইনফরমাল, রসাত্মক, সহানুভূতিশীল" value="{{ old('brand_tone_of_voice') }}">
                    </div>

                    <div class="input-group">
                        <label for="content_themes_pillars"><i class="fas fa-object-group label-icon"></i> আপনার কি কোনো নির্দিষ্ট কনটেন্ট থিম বা পিলার আছে যা আপনি ফোকাস করতে চান?</label>
                        <textarea id="content_themes_pillars" name="content_themes_pillars" placeholder="যেমন: সাসটেইনেবিলিটি, স্বাস্থ্যকর জীবনযাপন, প্রযুক্তিগত উদ্ভাবন">{{ old('content_themes_pillars') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="preferred_visuals"><i class="fas fa-image label-icon"></i> আপনার গ্রাহকদের আকৃষ্ট করার জন্য কোন ধরনের ভিজ্যুয়াল (ছবি/ভিডিও) সবচেয়ে ভালো কাজ করে?</label>
                        <textarea id="preferred_visuals" name="preferred_visuals" placeholder="যেমন: বাস্তব জীবনের ছবি, অ্যানিমেটেড ভিডিও, ইনফোগ্রাফিক্স, ব্যবহারকারী-তৈরি কনটেন্ট">{{ old('preferred_visuals') }}</textarea>
                    </div>
                </div>



<!---===========================================================================-->



                <div class="form-step" data-step="6">
                    <h2 class="section-title"><i class="fas fa-cogs"></i> ধাপ ৬: বাজেট, প্রযুক্তি ও ভবিষ্যৎ পরিকল্পনা</h2>
                    <p>আপনার বাজেট, প্রযুক্তিগত দিক এবং ভবিষ্যৎ পরিকল্পনা সম্পর্কে আমাদের জানান।</p>

                    <h3 class="sub-title"><i class="fas fa-coins"></i> বাজেট ও প্রত্যাশা</h3>
                    <div class="input-group">
                        <label for="project_budget"><i class="fas fa-money-bill-wave label-icon"></i> আমাদের সাথে কাজ করার জন্য আপনার আনুমানিক মাসিক বা প্রজেক্টভিত্তিক বাজেট কত?</label>
                        <input type="text" id="project_budget" name="project_budget" placeholder="এটি আমাদের সাধ্যের মধ্যে সেরা সমাধানটি প্রস্তাব করতে সাহায্য করবে" value="{{ old('project_budget') }}">
                    </div>

                    <div class="input-group">
                        <label for="budget_priorities"><i class="fas fa-sliders-h label-icon"></i> বাজেট বরাদ্দের ক্ষেত্রে আপনার কোনো নির্দিষ্ট অগ্রাধিকার আছে কি?</label>
                        <textarea id="budget_priorities" name="budget_priorities" placeholder="যেমন: ফেসবুক বিজ্ঞাপনে বেশি খরচ করতে চান, বা কনটেন্ট তৈরিতে ইত্যাদি">{{ old('budget_priorities') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="results_timeline"><i class="fas fa-hourglass-half label-icon"></i> ফলাফল দেখার জন্য আপনি সাধারণত কত সময় অপেক্ষা করতে ইচ্ছুক?</label>
                        <input type="text" id="results_timeline" name="results_timeline" placeholder="কিছু মার্কেটিং কৌশলে ফলাফল আসতে সময় লাগে" value="{{ old('results_timeline') }}">
                    </div>

                    <div class="input-group">
                        <label for="reporting_preference"><i class="fas fa-file-alt label-icon"></i> আপনি কীভাবে আমাদের কাজের অগ্রগতি এবং ফলাফল সম্পর্কে রিপোর্ট পেতে চান?</label>
                        <select id="reporting_preference" name="reporting_preference">
                            <option value="">-- নির্বাচন করুন --</option>
                            <option value="weekly" {{ old('reporting_preference') == 'weekly' ? 'selected' : '' }}>সাপ্তাহিক</option>
                            <option value="biweekly" {{ old('reporting_preference') == 'biweekly' ? 'selected' : '' }}>পাক্ষিক</option>
                            <option value="monthly" {{ old('reporting_preference') == 'monthly' ? 'selected' : '' }}>মাসিক</option>
                            <option value="on_demand" {{ old('reporting_preference') == 'on_demand' ? 'selected' : '' }}>প্রয়োজন অনুযায়ী</option>
                        </select>
                    </div>

                    <h3 class="sub-title"><i class="fas fa-laptop-code"></i> টেকনিক্যাল তথ্য</h3>
                    <p style="font-size: 0.9em; font-style: italic; color: #4b5563; margin-bottom: 15px;">(এই তথ্যগুলো নিরাপদে এবং শুধুমাত্র প্রয়োজনীয় ক্ষেত্রে ব্যবহার করা হবে।)</p>

                    <div class="input-group">
                        <label><i class="fas fa-laptop-code label-icon"></i> আপনার ওয়েবসাইটের অ্যাডমিন প্যানেলে কি আমাদের অ্যাক্সেসের প্রয়োজন হবে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="website_admin_access" value="yes" {{ old('website_admin_access') == 'yes' ? 'checked' : '' }}> হ্যাঁ</label>
                            <label><input type="radio" name="website_admin_access" value="no" {{ old('website_admin_access') == 'no' ? 'checked' : '' }}> না</label>
                            <label><input type="radio" name="website_admin_access" value="later" {{ old('website_admin_access') == 'later' ? 'checked' : '' }}> পরে জানাবো</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label><i class="fab fa-facebook-square label-icon"></i><i class="fab fa-instagram label-icon" style="margin-left:-5px;"></i><i class="fab fa-google label-icon" style="margin-left:-5px;"></i> আপনার সোশ্যাল মিডিয়া অ্যাকাউন্টগুলোতে কি আমাদের অ্যাডমিন/এডিটর অ্যাক্সেসের প্রয়োজন হবে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="social_media_access" value="yes" {{ old('social_media_access') == 'yes' ? 'checked' : '' }}> হ্যাঁ</label>
                            <label><input type="radio" name="social_media_access" value="no" {{ old('social_media_access') == 'no' ? 'checked' : '' }}> না</label>
                            <label><input type="radio" name="social_media_access" value="later" {{ old('social_media_access') == 'later' ? 'checked' : '' }}> পরে জানাবো</label>
                        </div>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-chart-bar label-icon"></i> আপনার কি গুগল অ্যানালিটিক্স, ফেসবুক পিক্সেল বা অন্য কোনো ট্র্যাকিং কোড ওয়েবসাইটে সেটআপ করা আছে?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="tracking_code_setup" value="yes" onclick="toggleConditionalField('tracking_code_access_details', true)" {{ old('tracking_code_setup') == 'yes' ? 'checked' : '' }}> হ্যাঁ</label>
                            <label><input type="radio" name="tracking_code_setup" value="no" onclick="toggleConditionalField('tracking_code_access_details', false)" {{ old('tracking_code_setup') == 'no' ? 'checked' : '' }}> না</label>
                        </div>
                        <div id="tracking_code_access_details" class="conditional-field">
                            <label for="tracking_code_access_needed" style="font-weight:normal;">থাকলে, সেগুলোর অ্যাক্সেস কি আমাদের প্রয়োজন হবে?</label>
                            <input type="text" id="tracking_code_access_needed" name="tracking_code_access_needed" placeholder="হ্যাঁ/না/আলোচনা সাপেক্ষ" value="{{ old('tracking_code_access_needed') }}">
                        </div>
                    </div>

                    <h3 class="sub-title"><i class="fas fa-rocket"></i> ভবিষ্যৎ পরিকল্পনা ও প্রযুক্তি</h3>
                    <div class="input-group">
                        <label for="future_products_services"><i class="fas fa-box-open label-icon"></i> আগামী ২-৩ বছরে আপনার ব্যবসার জন্য কোনো নতুন পণ্য বা সেবা আনার পরিকল্পনা আছে কি?</label>
                        <textarea id="future_products_services" name="future_products_services" placeholder="নতুন পণ্য/সেবা এবং সম্ভাব্য লঞ্চের সময় সম্পর্কে জানান">{{ old('future_products_services') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label for="tech_usage_plans"><i class="fas fa-microchip label-icon"></i> আপনার ব্যবসায় প্রযুক্তি ব্যবহারের বর্তমান অবস্থা এবং ভবিষ্যৎ পরিকল্পনা কী?</label>
                        <textarea id="tech_usage_plans" name="tech_usage_plans" placeholder="কোন কোন প্রযুক্তি ব্যবহার করছেন এবং ভবিষ্যতে কী ব্যবহারের পরিকল্পনা আছে?">{{ old('tech_usage_plans') }}</textarea>
                    </div>

                    <div class="input-group">
                        <label><i class="fas fa-credit-card label-icon"></i> ই-কমার্স বা অনলাইন পেমেন্ট সিস্টেম ব্যবহারে আপনার অভিজ্ঞতা বা আগ্রহ কেমন?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="ecommerce_payment_experience" value="currently_using" {{ old('ecommerce_payment_experience') == 'currently_using' ? 'checked' : '' }}> হ্যাঁ, বর্তমানে ব্যবহার করছি</label>
                            <label><input type="radio" name="ecommerce_payment_experience" value="interested_future" {{ old('ecommerce_payment_experience') == 'interested_future' ? 'checked' : '' }}> হ্যাঁ, ভবিষ্যতে আগ্রহী</label>
                            <label><input type="radio" name="ecommerce_payment_experience" value="not_interested" {{ old('ecommerce_payment_experience') == 'not_interested' ? 'checked' : '' }}> না, আগ্রহ নেই</label>
                        </div>
                    </div>
                </div>


<!---===========================================================================-->

        <div class="form-step" data-step="7">
                <h2 class="section-title"><i class="fas fa-check-circle"></i> ধাপ ৭: অতিরিক্ত তথ্য ও চূড়ান্তকরণ</h2>
                <p>আপনার যদি আরও কিছু জানানোর বা জিজ্ঞাসা করার থাকে, তবে তা এখানে উল্লেখ করুন।</p>

                <div class="input-group">
                    <label for="additional_info"><i class="far fa-comment-dots label-icon"></i> এমন কোনো বিষয় আছে যা আপনি আমাদের জানাতে চান, যা এই ফর্মে উল্লেখ করা হয়নি কিন্তু আমাদের জানা গুরুত্বপূর্ণ?</label>
                    <textarea id="additional_info" name="additional_info" placeholder="অন্যান্য প্রাসঙ্গিক তথ্য">{{ old('additional_info') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="how_found_agency"><i class="fas fa-map-signs label-icon"></i> আমাদের এজেন্সি সম্পর্কে আপনি কীভাবে জানতে পারলেন?</label>
                    <input type="text" id="how_found_agency" name="how_found_agency" placeholder="যেমন: রেফারেন্স, গুগল সার্চ, সোশ্যাল মিডিয়া ইত্যাদি" value="{{ old('how_found_agency') }}">
                </div>

                <div class="input-group">
                    <label for="questions_for_agency"><i class="fas fa-question-circle label-icon"></i> আমাদের কাছে আপনার কোনো প্রশ্ন আছে কি?</label>
                    <textarea id="questions_for_agency" name="questions_for_agency" placeholder="আপনার কোনো জিজ্ঞাসা থাকলে লিখুন">{{ old('questions_for_agency') }}</textarea>
                </div>

                <div class="input-group">
                    <label for="submission_date_final"><i class="fas fa-calendar-day label-icon"></i> জমাদানের তারিখ:</label>
                    <input type="date" id="submission_date_final" name="submission_date" required value="{{ old('submission_date') }}">
                </div>

                <div class="input-group checkbox-group">
                    <label style="border: none; background: none; padding-left: 0;">
                        <input type="checkbox" id="terms_agreement" name="terms_agreement" required {{ old('terms_agreement') ? 'checked' : '' }}>
                        আমি নিশ্চিত করছি যে উপরে দেওয়া সকল তথ্য সঠিক এবং আমি এজেন্সির [শর্তাবলী/গোপনীয়তা নীতি]-এর সাথে একমত।
                    </label>
                </div>
            </div>

<!---===========================================================================-->

            <div class="form-navigation">
                <button type="button" class="hidden prev-btn"><i class="fas fa-arrow-left"></i> পূর্ববর্তী</button>
                <button type="button" class="next-btn">পরবর্তী <i class="fas fa-arrow-right"></i></button>
                <button type="submit" class="hidden submit-btn"><i class="fas fa-paper-plane"></i> ফরম জমা দিন</button>
            </div>
        </form>
    </div>


<script>
function toggleConditionalField(id) {
    const el = document.getElementById(id);
    if (el) {
        el.style.display = (el.style.display === 'none' || el.style.display === '') ? 'block' : 'none';
    }
}

// Multi-step form
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('clientOnboardingForm');
    const formSteps = Array.from(document.querySelectorAll('.form-step'));
    const progressSteps = Array.from(document.querySelectorAll('.progress-bar .step'));
    const mobileProgressInfo = document.querySelector('.mobile-progress-info');
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const submitBtn = document.querySelector('.submit-btn');

    let currentStep = 0;

    function displayError(field, message) {
        field.classList.add('invalid');
        let container = field.closest('.input-group') || field.parentNode;
        let errorMsg = container.querySelector('.error-message');
        if (!errorMsg) {
            errorMsg = document.createElement('div');
            errorMsg.className = 'error-message';
            container.appendChild(errorMsg);
        }
        errorMsg.textContent = message;
    }

    function clearError(field) {
        field.classList.remove('invalid');
        let container = field.closest('.input-group') || field.parentNode;
        let errorMsg = container.querySelector('.error-message');
        if (errorMsg) errorMsg.remove();
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isValidPhoneNumber(phone) {
        return /^[+]?[\d\s\-\(\)]{7,20}$/.test(phone);
    }

    function isValidMobileNumberBD(mobile) {
        return /^01[3-9]\d{8}$/.test(mobile) && mobile.length === 11;
    }

    function validateStep(stepIndex) {
        let isValid = true;
        const step = formSteps[stepIndex];
        step.querySelectorAll('.error-message').forEach(e => e.remove());
        step.querySelectorAll('.invalid').forEach(e => e.classList.remove('invalid'));

        const fields = step.querySelectorAll('input, textarea, select');
        fields.forEach(field => {
            let visible = true;
            const parentConditional = field.closest('.conditional-field');
            if (parentConditional && parentConditional.style.display === 'none') visible = false;

            if (!visible) return;

            if (field.hasAttribute('required') && !field.value.trim()) {
                isValid = false;
                displayError(field, 'এই ফিল্ডটি পূরণ করুন।');
            } else {
                if (field.type === 'email' && field.value && !isValidEmail(field.value)) {
                    isValid = false;
                    displayError(field, 'সঠিক ইমেইল দিন।');
                }
                if ((field.id === 'contact_phone' || field.id === 'alternative_phone') && field.value && !isValidPhoneNumber(field.value)) {
                    isValid = false;
                    displayError(field, 'সঠিক ফোন নম্বর দিন।');
                }
                if (field.id === 'whatsapp_number' && field.value && !isValidMobileNumberBD(field.value)) {
                    isValid = false;
                    displayError(field, 'সঠিক ১১ সংখ্যার WhatsApp নম্বর দিন।');
                }
            }
        });

        return isValid;
    }

    function updateFormUI() {
        formSteps.forEach((step, i) => step.classList.toggle('active-step', i === currentStep));
        progressSteps.forEach((stepLi, i) => {
            stepLi.classList.remove('active', 'completed');
            if (i === currentStep) stepLi.classList.add('active');
            else if (i < currentStep) stepLi.classList.add('completed');
        });

        prevBtn.classList.toggle('hidden', currentStep === 0);
        nextBtn.classList.toggle('hidden', currentStep === formSteps.length - 1);
        submitBtn.classList.toggle('hidden', currentStep !== formSteps.length - 1);

        if (mobileProgressInfo) {
            mobileProgressInfo.textContent = `ধাপ ${currentStep + 1} / ${formSteps.length}`;
        }
    }

    updateFormUI();

    nextBtn.addEventListener('click', () => {
        if (validateStep(currentStep) && currentStep < formSteps.length - 1) {
            currentStep++;
            updateFormUI();
            window.scrollTo(0, 0);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            updateFormUI();
            window.scrollTo(0, 0);
        }
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!validateStep(currentStep)) return;

        const formData = new FormData(form);
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMeta ? csrfMeta.content : '';

        try {
            const res = await fetch('{{ route("client.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const contentType = res.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                const data = await res.json();
                if (data.success) {
                    alert('✅ ফর্ম সফলভাবে জমা হয়েছে!');
                    window.location.href = "{{route('user.dashboard')}}";
                } else {
                    alert('কিছু ভুল হয়েছে, আবার চেষ্টা করুন।');
                }
            } else {
                alert('সার্ভার থেকে JSON আসেনি।');
            }
        } catch (err) {
            console.error('Error:', err);
            alert('একটি ত্রুটি ঘটেছে।');
        }
    });
});
</script>



</body>

</html>
