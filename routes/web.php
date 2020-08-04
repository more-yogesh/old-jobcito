<?php

//Route::get('/migrate', function (){
//    \Illuminate\Support\Facades\Artisan::call('migrate');
//    $exitCode = Artisan::call('storage:link', [] );
//    return $exitCode; // 0 exit code for no errors.
//});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes(['verify' => true]);

Route::get('/', 'WelcomeController@index')->name('welcome')->middleware('guest');
Route::get('search', 'WelcomeController@search')->name('search');
Route::get('job/{id}/{slug?}', 'WelcomeController@showJob')->name('showJob');
Route::get('company/{id}/{slug}', 'WelcomeController@showCompany')->name('showCompany');
Route::get('contact-us', 'ContactUsController@index')->name('contact.index');
Route::post('contact-us', 'ContactUsController@store')->name('contact.store');
//Route::get('/{slug}', 'PageController@index')->name('page.show');
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');
Route::resource('page', 'PageController');
Route::resource('feedback', 'FeedbackController');
Route::resource('admin', 'DashboardController');


Route::group(['middleware' => ['auth', 'role:employee'], 'namespace' => 'Employee', 'prefix' => 'employee'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('employee.dashboard');
    Route::post('/employee-review', 'ReviewController@store')->name('employee-review');
    Route::resource('profile', 'EmployeeProfileController');
    Route::resource('experience', 'ExperienceController');
    Route::post('/status', 'EmployeeProfileController@changeStatus')->name('jobSearch');
    Route::get('/settings', 'ChangePasswordController@index')->name('settings.index');
    Route::post('/settings', 'ChangePasswordController@update')->name('settings.update');
    Route::post('/job-applied/{jobId}', 'EmployeeAppliedJobsController@apply')->name('appliedJob');
});

Route::group(['middleware' => ['auth', 'verified', 'role:employer'], 'prefix' => 'employer'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('employer.dashboard');
    Route::resource('employer-profile', 'EmployerProfileController');
    Route::resource('jobs', 'JobController');
    Route::resource('gallery', 'EmployerGalleryController');
    Route::post('/status', 'EmployerProfileController@changeStatus')->name('change-status');
    Route::get('/setting-password', 'ChangePasswordController@index')->name('setting.index');
    Route::post('/setting-password', 'ChangePasswordController@update')->name('setting.update');
    Route::get('manage-candidates/{id}', 'ManageCandidateController@show')->name('candidates');
    Route::get('get-notification', 'EmployerNotification@index')->name('notifications');
});
Route::post('/getCities', 'CityController@index')->name('cities');

// socila media Links
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('change-notification-status/{notification}', 'NotificationController@markNotificationAsRead')->name('notificationStatus');
    Route::get('notification', 'NotificationController@allNotifications')->name('notification.paginate');
    Route::get('get-notification', 'NotificationController@index')->name('notifications');
});
