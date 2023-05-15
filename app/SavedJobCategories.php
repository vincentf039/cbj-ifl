<?php

namespace App;

use App;
use App\Traits\Lang;
use App\Traits\IsDefault;
use App\Traits\Active;
use App\Traits\Sorted;
use Illuminate\Database\Eloquent\Model;

class SavedJobCategories extends Model
{
    use Lang;
    use IsDefault;
    use Active;
    use Sorted;

    protected $table = 'saved_job_categories';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $dates = ['created_at', 'updated_at'];

    public function user () {
        return $this->belongsToMany('App\User', 'id', 'user_id');
    }

    public function jobsBySkill () {
        return $this->belongsToMany('App\JobSkill', 'job_skill_id', 'job_skill_id');
    }

    public function jobsByExperience () {
        return $this->belongsToMany('App\JobExperience', 'job_experience_id', 'job_experience_id');
    }

    public function jobsByType () {
        return $this->belongsToMany('App\JobType', 'job_type_id', 'job_type_id');
    }

    public function jobsByShift () {
        return $this->belongsToMany('App\JobShift', 'job_shift_id', 'job_shift_id');
    }

    public function jobsByDegreeLevel () {
        return $this->belongsToMany('App\DegreeLevel', 'degree_level_id', 'degree_level_id');
    }

    public function jobsByIndustry() {
        return $this->belongsToMany('App\Industry', 'industry_id', 'industry_id');
    }

    public function jobsByFunctionalArea () {
        return $this->belongsToMany('App\FunctionalArea', 'functional_area_id', 'functional_area_id');
    }

    public function jobsByCompany () {
        return $this->belongsToMany('App\Company', 'id', 'company_id');
    }


    
}
