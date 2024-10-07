<?php

use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use Illuminate\Http\Request;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use App\Livewire\Billing\Cancel;
use App\Livewire\Billing\Portal;
use App\Livewire\Template\Index;
use App\Livewire\Billing\Pricing;
use App\Livewire\Billing\Success;
use App\Livewire\Billing\Checkout;
use App\Livewire\Template\Listing;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Onboarding\AskCompany;
use App\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Customizer\Index as Customizer;
use App\Livewire\CaseStudy\Edit as EditCaseStudy;
use App\Livewire\Profile\Manage as ManageProfile;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Tenant\TemplateController;
use App\Livewire\Profile\Password as ChangePassword;
use App\Livewire\CaseStudy\Create as CreateCaseStudy;
use App\Livewire\CaseStudy\Manage as ManageCaseStudy;
use App\Http\Controllers\Auth\EmailVerificationController;

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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
    
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])
        ->name('socialite.auth');
 
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])
        ->name('socialite.callback');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware(['auth','tenant.session'])->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
    
    Route::get('onboarding', AskCompany::class)
        ->name('onboarding')->middleware('check.onboarding');

    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');
    
    Route::get('template/list', Index::class)
        ->name('template');
    
    Route::get('template/choose', Listing::class)
        ->name('template.choose');
    
    Route::get('pricing', Pricing::class)
        ->name('pricing');
    
    Route::get('checkout', Checkout::class)
        ->name('checkout');
    
    Route::get('billing/success', Success::class)
        ->name('billing.success');

    Route::get('billing/cancel', Cancel::class)
        ->name('billing.cancel');

    Route::get('/billing', function (Request $request) {
        if(auth()->user()->hasSubscription()){
            return $request->user()->redirectToBillingPortal(route('dashboard'));
        }else {
            return redirect()->route('billing.not-subscribed');
        }
    })->name('billing');

    Route::get('/billing/portal', Portal::class)
        ->name('billing.not-subscribed');
    
    Route::get('/case-study/create', CreateCaseStudy::class)
        ->name('case-study.create');
    
    Route::get('/case-study/edit/{id}', EditCaseStudy::class)
        ->name('case-study.edit');
    
    Route::get('/case-study/manage', ManageCaseStudy::class)
        ->name('case-study.manage');
    
    // Profile Routes
    Route::get('/profile/manage',ManageProfile::class)
        ->name('profile.manage');
    Route::get('/profile/password/change',ChangePassword::class)
        ->name('profile.manage.password');

    // Customizer Routes
    Route::get('/{tenant_id}/webpage', [TemplateController::class, 'index'])->name('tenant.web');


    Route::get('/customize/template',Customizer::class)
        ->name('customize.index');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('logout', LogoutController::class)
        ->name('logout');
});


Route::get('/error-404',function(){
    abort(404);
});