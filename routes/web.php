<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return redirect("dashboard");
});

Route::group(['namespace' => 'Auth'], function() {
    Route::post("registeruser", "UserRegistrationController@register")->name("registerUser");
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource("dashboard", "DashboardController");
    Route::resource('personnels', 'PersonnelsController');
    Route::resource('locations', 'LocationsController');
});

// generic route for delete functionality
Route::post('/delete', 'CommonController@deleteRecord');

Route::group([
    'prefix' => 'assets',
    'middleware' => 'auth',
    'namespace' => 'Assets'], function() {
    Route::resource('list', 'AssetsController');
    Route::resource('register', 'RegisterController');
    Route::resource('assign', 'AssignController');
    Route::resource('profile', 'ProfileController');

    Route::get('maintenance/pdf', 'MaintenanceController@pdf')->name('maintenance.pdf');
    Route::get('maintenance/excel', 'MaintenanceController@excel')->name('maintenance.excel');
    Route::resource('maintenance', 'MaintenanceController');

    Route::get('licenses/pdf', 'LicenseController@pdf')->name('licenses.pdf');
    Route::get('licenses/excel', 'LicenseController@excel')->name('licenses.excel');
    Route::resource('licenses', 'LicenseController');
    Route::post('assign/license', 'LicenseController@assign');
});

Route::group([
    'prefix' => 'settings',
    'middleware' => 'auth',
    'namespace' => 'Settings'], function() {
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('assetCategories', 'AssetCategoriesController');
    Route::resource('status', 'StatusLabelsController');

    Route::get('suppliers/pdf', 'SuppliersController@pdf')->name('suppliers.pdf');
    Route::get('suppliers/excel', 'SuppliersController@excel')->name('suppliers.excel');
    Route::resource('suppliers', 'SuppliersController');
    Route::resource('system', 'SystemController');
});

Route::group([
    'prefix' => 'lookups',
    'middleware' => 'auth',
    'namespace' => 'Lookups'], function() {
    Route::resource('lookup', 'LookupController');
    Route::post('delete', 'LookupController@delete');
});

Route::group([
    'prefix' => 'profile',
    'middleware' => 'auth',
    'namespace' => 'Profiles'], function() {
    Route::resource('personnel', 'PersonnelController', ['as' => 'profile']);
    Route::resource('location', 'LocationController', ['as' => 'profile']);
    Route::resource('user', 'UsersController', ['as' => 'profile']);
});

Route::group([
    'prefix' => 'reports',
    'middleware' => 'auth',
    'namespace' => 'Reports'], function() {

    Route::post('depreciation/pdf', 'DepreciationController@pdf')->name('report.depreciation.pdf');
    Route::post('depreciation/excel', 'DepreciationController@excel')->name('report.depreciation.excel');

    Route::resource('assets', 'AssetsController', ['as' => 'report']);

    Route::post('qrcodes/pdf', 'QRCodesController@qrCodePdf')->name('report.qrcodes.pdf');
    Route::post('qrcodes', 'QRCodesController@index', ['as' => 'report']);
    Route::resource('qrcodes', 'QRCodesController', ['as' => 'report', 'except' => 'store']);

    Route::resource('disposed', 'DisposedController', ['as' => 'report']);
    Route::resource('maintenance', 'MaintenanceController', ['as' => 'report']);
    Route::post('depreciation', 'DepreciationController@index', ['as' => 'report']);
    Route::resource('depreciation', 'DepreciationController', ['as' => 'report', 'except' => 'store']);
    Route::resource('activities', 'ActivityLogController', ['as' => 'report']);

    Route::resource('suppliers', 'SuppliersController', ['as' => 'report']);
});

Route::group(['middleware' => 'auth', 'prefix' => 'api'], function() {
    Route::get("totalAssetCount", "DashboardController@getTotalAssets");
    Route::get("totalAssetsPerCategory", "DashboardController@getTotalAssetsPerCategory");
    Route::get("totalAssetsPerStatus", "DashboardController@getTotalAssetsPerStatus");
    Route::get("totalUsersPerRole", "DashboardController@getTotalUsersPerRole");
    Route::get('settings/customDashboard/{chart}/{type}', '\App\Http\Controllers\Settings\SystemController@customDashboard');
});



Route::get("logout", function() {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect("/");
});

Route::get("test", function() {

    $assets = App\Model\Asset::where(function($q) {
                $q->whereNotNull('purchasedCost');
                $q->whereNotNull('lifespan');

            });

    $assets = $assets->orderBy('created_at', 'desc')->get();
    return $assets;
});

Route::get("parse", function() {
//    $asset = \App\Model\Asset::with(['categoryDetails', 'statusDetails', 'locationDetails'])->find("T47001");
//    $asset = \App\Model\Asset::get();
//
//    $subset = $asset->map(function ($asset) {
//                return collect($asset->toArray())
//                                ->only(['tag', 'name', 'warranty', 'warranty_expiry', 'days_remaining', 'description'])
//                                ->all();
//            })->filter(function($item, $key) {
//                if ($item['days_remaining'] != null && $item['days_remaining'] <= 60) {
//                    return true;
//                }
//            })->values();
//    $location = App\Model\AssetLocation::find(2);


    $asset = App\Model\Asset::with(['categoryDetails', 'statusDetails', 'locationDetails', 'maintenance', 'supplier'])->find(123123);

    return $asset;
});

Route::get('settings', function() {

    \App\Helpers\Settings::clear();
//    return Settings::get('1_dashboard')->dashboard_type;
    return Settings::all();
});

Route::get('send', "NotificationController@send");

use Barryvdh\DomPDF\Facade as PDF;

Route::get('pdf', function() {

    $pdf = PDF::loadView('home');
    return $pdf->stream();
});


Route::get('qrcode', function () {
//    return SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate('Asset Tag: IASDLKS83928' . PHP_EOL . 'Assigned To: Ivan');
    echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("4", "QRCODE") . '" alt="barcode"   />';
});
