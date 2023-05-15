<?php

Route::get('/import-company-info', array_merge(['uses' => 'Admin\ImportCompanyInfo@import'], $sup_only))->name('import.company.info');

?>