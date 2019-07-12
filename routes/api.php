<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'user' => 'API\UserController'
]);

// Route::apiResources([
//     'donation' => 'API\DonationController'
// ]);

/** All Blood Unit Related Tables */

Route::apiResources([
    'blood_unit' => 'API\BloodUnitController'
]);

Route::apiResources([
    'registered_blood_unit' => 'API\RegisteredBloodUnitController'
]);

Route::apiResources([
    'typed_blood_unit' => 'API\TypedBloodUnitController'
]);

Route::apiResources([
    'processed_blood_unit' => 'API\ProcessedBloodUnitController'
]);

Route::apiResources([
    'tested_blood_unit' => 'API\TestedBloodUnitController'
]);

Route::apiResources([
    'donation' => 'API\DonationController'
]);

Route::apiResources([
    'donor_personal_details' => 'API\DonorPersonalDetailsController'
]);

Route::apiResources([
    'agency' => 'API\AgencyController'
]);

Route::apiResources([
    'mbd' => 'API\MBDController'
]);  

Route::apiResources([
    'donor' => 'API\DonorController'
]);
