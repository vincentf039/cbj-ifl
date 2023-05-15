<?php

namespace App;

use App;
use App\Traits\Lang;
use App\Traits\IsDefault;
use App\Traits\Active;
use App\Traits\Sorted;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{

    use Lang;
    use IsDefault;
    use Active;
    use Sorted;

    protected $table = 'job_skills';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $dates = ['created_at', 'updated_at'];


    public function savedJobCategories () {
        return $this->hasMany('App\SavedCategories', 'job_skill_id', 'job_skill_id');
    }

    public function users_skills(){

        return $this->belongsToMany('App\ProfileSkills', 'job_skill_id', 'job_skill_id');

    }

    public function profileSkill(){

        return $this->belongsTo('App\ProfileSkill', 'job_skill_id', 'job_skill_id');
    }

    public function talent_list(){
        return $this->belongsTo('App\JobCategories', 'id', 'category_id');
    }
	

}
