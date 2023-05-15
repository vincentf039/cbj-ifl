<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Job;

use Auth;
use App\Traits\Cron;
use App\Job;
use App\FavouriteCompany;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\JobApply;
use App\FavouriteJob;
use App\Company;
use App\JobSkill;
use App\JobSkillManager;
use App\JobCategories;
use App\Country;
use App\CountryDetail;
use App\State;
use App\City;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\Seo;
use App\JobExperience;
use App\DegreeLevel;
use App\ProfileCv;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\JobFormRequest;
use App\Http\Requests\Front\ApplyJobFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\FetchJobs;
use App\Events\JobApplied;
use App\SavedJobCategories;

class HomeController extends Controller
{

    use Cron;

    //use Skills;
    use FetchJobs;

    private $functionalAreas = '';
    private $countries = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->runCheckPackageValidity();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    // public function index()
    // {
    //     $matchingJobs = Job::where('functional_area_id', auth()->user()->industry_id)->paginate(7);
	// 	$followers = FavouriteCompany::where('user_id', auth()->user()->id)->get();
	// 	$latestJobs = Job::active()->notExpire()->orderBy('id', 'desc')->limit(18)->get();
    //     $chart='';
    //     return view('home', compact('chart', 'matchingJobs', 'followers'))->with('latestJobs', $latestJobs);
    // }

    // public function index()
    // {
	// 	$followers = FavouriteCompany::where('user_id', auth()->user()->id)->get();
	// 	$latestJobs = Job::active()->notExpire()->orderBy('id', 'desc')->paginate(20);
    //     $myFavouriteJobSlugs = Auth::user()->getFavouriteJobSlugsArray();
    //     $savedJobs = Job::whereIn('slug', $myFavouriteJobSlugs)->paginate(10);
    //     $matchingJobs = Job::where('functional_area_id', auth()->user()->industry_id)
    //                         ->orWhere('country_id', auth()->user()->country_id)
    //                         ->orWhere('city_id', auth()->user()->city_id)
    //                         ->orWhere('career_level_id', auth()->user()->career_level_id)
    //                         ->orWhere('career_level_id', auth()->user()->career_level_id)
    //                         ->paginate(20);
    //     $chart='';
    //     return view('home', compact('chart', 'matchingJobs', 'followers'))
    //         ->with('myFavouriteJobSlugs', $myFavouriteJobSlugs)
    //         ->with('matchingJobs', $matchingJobs)
    //         ->with('latestJobs', $latestJobs)
    //         ->with('savedJobs', $savedJobs);
    // }

    public function index(Request $request)
    {
        $followers = FavouriteCompany::where('user_id', auth()->user()->id)->get();
		$latestJobs = Job::active()->notExpire()->orderBy('id', 'desc')->paginate(20);
        $myFavouriteJobSlugs = Auth::user()->getFavouriteJobSlugsArray();
        $savedJobs = Job::whereIn('slug', $myFavouriteJobSlugs)->paginate(10);
        $matchingJobs = Job::where('functional_area_id', auth()->user()->industry_id)
                            ->orWhere('country_id', auth()->user()->country_id)
                            ->orWhere('city_id', auth()->user()->city_id)
                            ->orWhere('career_level_id', auth()->user()->career_level_id)
                            ->orWhere('career_level_id', auth()->user()->career_level_id)
                            ->paginate(20);
        $chart='';
        $search = $request->query('search', '');
        $job_titles = $request->query('job_title', array());
        $company_ids = $request->query('company_id', array());
        $industry_ids = $request->query('industry_id', array());
        $job_skill_ids = $request->query('job_skill_id', array());
        $functional_area_ids = $request->query('functional_area_id', array());
        $country_ids = $request->query('country_id', array());
        $state_ids = $request->query('state_id', array());
        $city_ids = $request->query('city_id', array());
        $is_freelance = $request->query('is_freelance', array());
        $career_level_ids = $request->query('career_level_id', array());
        $job_type_ids = $request->query('job_type_id', array());
        $job_shift_ids = $request->query('job_shift_id', array());
        $gender_ids = $request->query('gender_id', array());
        $degree_level_ids = $request->query('degree_level_id', array());
        $job_experience_ids = $request->query('job_experience_id', array());
        $salary_from = $request->query('salary_from', '');
        $salary_to = $request->query('salary_to', '');
        $salary_currency = $request->query('salary_currency', '');
        $is_featured = $request->query('is_featured', 2);
        $order_by = $request->query('order_by', 'id');
        $limit = 15;
        $talent_categories = JobCategories::with('talent_list')->get();
        $jobs = $this->fetchJobs($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, $order_by, $limit);
        
        
        /*         * ************************************************** */
        
        $jobTitlesArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.title');
        
        /*         * ************************************************* */
        
        $jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.id');
        
        /*         * ************************************************** */
        
        $skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);
        
        /*         * ************************************************** */
        
        $countryIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.country_id');
        
        /*         * ************************************************** */
        
        $stateIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.state_id');
        
        /*         * ************************************************** */
        
        $cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.city_id');
        
        /*         * ************************************************** */
        
        $companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.company_id');
        
        /*         * ************************************************** */
        
        $industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);
        
        /*         * ************************************************** */
        
        
        /*         * ************************************************** */
        
        $functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.functional_area_id');
        
        /*         * ************************************************** */
        
        $careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.career_level_id');
        
        /*         * ************************************************** */
        
        $jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_type_id');
        
        /*         * ************************************************** */
        
        $jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_shift_id');
        
        /*         * ************************************************** */
        
        $genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.gender_id');
        
        /*         * ************************************************** */
        
        $degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.degree_level_id');
        
        /*         * ************************************************** */
        
        $jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'jobs.job_experience_id');
        
        /*         * ************************************************** */
        
        $seoArray = $this->getSEO($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);
        
        /*         * ************************************************** */
        
        $currencies = DataArrayHelper::currenciesArray();
        
        /*         * ************************************************** */
        
        $seo = Seo::where('seo.page_title', 'like', 'jobs')->first();

        /*         * ************************************************** */

        // $savedJobCategories = !empty(SavedJobCategories::where('job_category_id', 1)->get()) ? SavedJobCategories::where('job_category_id', 1)->get() : null;
        // dd($savedJobCategories);

        // to show job categories at home page
        $user_id = Auth::user()->id;
        $jobCategoryLinks = SavedJobCategories::where('user_id', $user_id)->get();

        /*         * ************************************************** */

        return view('home', compact('chart', 'matchingJobs', 'followers'))
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
                        ->with('jobs', $jobs)
                        ->with('jobTitlesArray', $jobTitlesArray)
                        ->with('skillIdsArray', $skillIdsArray)
                        ->with('countryIdsArray', $countryIdsArray)
                        ->with('stateIdsArray', $stateIdsArray)
                        ->with('cityIdsArray', $cityIdsArray)
                        ->with('companyIdsArray', $companyIdsArray)
                        ->with('industryIdsArray', $industryIdsArray)
                        ->with('functionalAreaIdsArray', $functionalAreaIdsArray)
                        ->with('careerLevelIdsArray', $careerLevelIdsArray)
                        ->with('jobTypeIdsArray', $jobTypeIdsArray)
                        ->with('jobShiftIdsArray', $jobShiftIdsArray)
                        ->with('genderIdsArray', $genderIdsArray)
                        ->with('degreeLevelIdsArray', $degreeLevelIdsArray)
                        ->with('jobExperienceIdsArray', $jobExperienceIdsArray)
                        ->with('seo', $seo)
                        ->with('talent_categories', $talent_categories)
                        ->with('myFavouriteJobSlugs', $myFavouriteJobSlugs)
                        ->with('matchingJobs', $matchingJobs)
                        ->with('latestJobs', $latestJobs)
                        ->with('savedJobs', $savedJobs)
                        ->with('jobCategoryLinks', $jobCategoryLinks);
    }

}
