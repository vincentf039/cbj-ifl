<?php
Route::get('talents', 'Talent\TalentController@indexTalents')->name('talent');
Route::get('talents/{slug}', 'Talent\TalentController@talents');
Route::get('talent/resume/{slug}', 'Talent\TalentController@talentResume');


