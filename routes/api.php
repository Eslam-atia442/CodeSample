<?php

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\EnumController;
use App\Http\Controllers\Api\V1\Auth\{
    LoginController,
    LogoutController,
    RegisterController,
    ResetPasswordController,
    VerifyController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{AboutController,
    CalendarDayController,
    ClinicController,
    ContactController,
    CountryController,
    CommitteeController,
    DonationController,
    FaqController,
    FileController,
    GovernanceController,
    GuidanceManualController,
    HomeController,
    MedicalConsultingController,
    MemberController,
    PartnerGroupController,
     ReservationController,
     PatientAwarenessController,
     ScientificResearchController,
    TranslatedBookController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//----------------------------------------------- Enums -------------------------------------------------------

Route::get('enums', [EnumController::class, 'enums']);

//----------------------------------------------- Authentication -------------------------------------------------------


Route::middleware('guest:sanctum')->group(function () {

    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);
    Route::post('verify', VerifyController::class);


    Route::group(['prefix' => 'reset-password'], function () {
        Route::post('phone-number-validation', [ResetPasswordController::class, 'phoneNumberValidation']);
        Route::post('send-code', [ResetPasswordController::class, 'sendCode']);
        Route::post('change-password', [ResetPasswordController::class, 'changePassword']);
    });

});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', LogoutController::class);
});

//-------------------------------------------------- Countries ---------------------------------------------------------
Route::get('countries', [CountryController::class, 'index']);
//------------------------------------------ Settings ------------------------------------------------------------------
Route::get("about", [AboutController::class, 'index']);
Route::get("clinic-settings", [AboutController::class, 'getClinicSetting']);
Route::get("about-disease", [AboutController::class, 'getAboutDisease']);
Route::get("information-about-treatment", [AboutController::class, 'getInformationAboutTreatment']);
//------------------------------------------------ Committees ----------------------------------------------------------
Route::apiResource('committees', CommitteeController::class);
//------------------------------------------------ Associations Members-------------------------------------------------
Route::controller(MemberController::class)->prefix('members')->group(function () {
    Route::get('board-of-directors', 'getBoardDirectoryMembers');
    Route::get('general-assembly', 'getGeneralAssemblyMembers');
    Route::get('organizational-structure', 'getOrganizationalStructureMembers');
});
//------------------------------------------------ Associations Files---------------------------------------------------
Route::controller(FileController::class)->prefix('files')->group(function () {
    Route::get('meeting-board-of-directors', 'getBoardDirectoryFiles');
    Route::get('meeting-general-assembly', 'getGeneralAssemblyFiles');
    Route::get('meeting-organizational-structure', 'getOrganizationalStructureFiles');
});
//------------------------------------------------- Committees ---------------------------------------------------------
Route::apiResource('committees', CommitteeController::class)->only('index', 'show');
//------------------------------------------------- Governance ---------------------------------------------------------
Route::get('governance-lists', [GovernanceController::class, 'index']);
//------------------------------------------------- Donations ----------------------------------------------------------
Route::get('donations', [DonationController::class, 'index']);
//------------------------------------------------ Partner groups ------------------------------------------------------
Route::get('partner-groups', [PartnerGroupController::class, 'index']);
//------------------------------------------------------------ Home ----------------------------------------------------
Route::get('home', [HomeController::class, 'index']);
//------------------------------------------------------------ Contact Us ----------------------------------------------
Route::post('contact-us', [ContactController::class, 'store']);

Route::get('version', [HomeController::class, 'versionValue']);

//------------------------------------------------ Consulting Services -------------------------------------------------
Route::post('send-consulting', [MedicalConsultingController::class, 'store']);
//-------------------------------------------------- Scientific Research -----------------------------------------------
Route::get('scientific-researches', [ScientificResearchController::class, 'index']);
//-------------------------------------------------- Translated Book ---------------------------------------------------
Route::get('translated-books', [TranslatedBookController::class, 'index']);
//-------------------------------------------------- Guidance Manual ---------------------------------------------------
Route::get('guidance-manual', [GuidanceManualController::class, 'index']);

//------------------------------------------------ Calendar Days -------------------------------------------------
//Route::controller(CalendarDayController::class)->prefix('calendar-days')->group(function () {
//    Route::get('list', 'list');
//});

//-------------------------------------------------- clinics  ---------------------------------------------------
Route::get('clinics', [ClinicController::class, 'index']);


//-------------------------------------------------- Faq  ---------------------------------------------------
Route::get('frequently-asked-questions', [FaqController::class, 'index']);

  //-------------------------------------------------- Reservations  ---------------------------------------------------

Route::middleware('auth:sanctum')->group(function () {
    Route::get('reservations', [ReservationController::class, 'index']);
    Route::post('create_reservation', [ReservationController::class, 'store']);
    Route::post('update_reservation/{reservation}', [ReservationController::class, 'update']);
});

 //-------------------------------------------------- Patient Awareness  ---------------------------------------------------
Route::get('patient-awareness', [PatientAwarenessController::class, 'index']);

