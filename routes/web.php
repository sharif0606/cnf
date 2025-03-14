<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\ProfileController as profile;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\Settings\Location\CountryController as country;
use App\Http\Controllers\Settings\Location\DivisionController as division;
use App\Http\Controllers\Settings\Location\DistrictController as district;
use App\Http\Controllers\Settings\Location\UpazilaController as upazila;
use App\Http\Controllers\Settings\Location\ThanaController as thana;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OurMemberController as member;
use App\Http\Controllers\SmsBalanceController as smsPanel;
use App\Http\Controllers\MemberPanel;
use App\Http\Controllers\NoticeController as notice;
use App\Http\Controllers\FacilitiesController as facilities;
use App\Http\Controllers\YearController as year;
use App\Http\Controllers\PhotoGallaryCategoryController as pGalleryCat;
use App\Http\Controllers\PhotoGallaryController as pGallery;
use App\Http\Controllers\VideoGalleryController as vGallery;
use App\Http\Controllers\VideoGallaryCategoryController as vGalleryCat;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\BanklistController as bank;
use App\Http\Controllers\TagController as tag;
use App\Http\Controllers\BlogCategoryController as blogcat;
use App\Http\Controllers\BlogController as blog;
use App\Http\Controllers\BenefitsOfMemberController as benefit;
use App\Http\Controllers\ContactUsController as contact;
use App\Http\Controllers\PaymentPurposeController as ppurpose;
use App\Http\Controllers\FeeCollectionController as feeCollection;
use App\Http\Controllers\OthersPaymentController as othersPay;
use App\Http\Controllers\ContactReasonController as creason;
use App\Http\Controllers\MemberContactReasonController as mcreason;
use App\Http\Controllers\TermsOfMembershipController as terms;
use App\Http\Controllers\TotalDueController as tdue;
use App\Http\Controllers\FoundingCommitteeController as foundCommittee;
use App\Http\Controllers\CommitteeSessionController as committeeSession;
use App\Http\Controllers\ExecutiveCommitteeController as exeCommittee;


use App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\PageController as page;
use App\Http\Controllers\MediaController as media;
use App\Http\Controllers\ScrollNoticeController as scrollN;
use App\Http\Controllers\VideoNoticeController as vNotice;
use App\Http\Controllers\FrontMenuController as frontMenu;
/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isChairman;
use App\Http\Middleware\isGeneralSecretary;

use App\Http\Middleware\isSalesmanager;

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

// Become a member login
Route::get('/memberRegister', [auth::class,'memberSignUpForm'])->name('member_registration');
Route::post('/memberRegister', [auth::class,'memberSignUpStore'])->name('memberRegister.store');
Route::get('/memberLogin', [auth::class,'memberSignInForm'])->name('memberLogin');
Route::post('/memberLogin', [auth::class,'memberSignInCheck'])->name('memberlogin.check');
Route::get('/memberLogOut', [auth::class,'memberSingOut'])->name('memberLogOut');
Route::get('/password-reset', [auth::class,'memberPasswordReset'])->name('passwordReset');

// Member login
Route::get('/mlogin', [auth::class,'memSignInForm'])->name('memLogin');
Route::post('/mlogin', [auth::class,'memSignInCheck'])->name('memlogin.check');

// Contact Us
Route::get('/contact-us', [contact::class,'store'])->name('contact.us');


Route::get('/', [front::class,'index'])->name('front');
Route::get('12kzjzjkhf32/user/{id}', [front::class,'memberLink'])->name('member_link');
//Route::get('/register', [auth::class,'signUpForm'])->name('register');
//Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');
Route::get('/benfit_of_membrer', [front::class,'benefit'])->name('member.benefit');
Route::get('/all-notice', [front::class,'allNotice'])->name('all-notice');
Route::get('/news-events-detail{id}', [front::class,'newsEventsDetail'])->name('event_notice_detail');
Route::get('/news-events', [front::class,'newsEvents'])->name('event-notice');
Route::get('event-news-search', [front::class,'nwesSearch'])->name('news.search');
Route::get('/contact_us', [front::class,'contactUs'])->name('contact-Us');
Route::get('/become_a_member', [front::class,'mem_regi'])->name('member.registration');
Route::post('/become_a_member/save', [front::class,'mem_regi_store'])->name('member.registration.store');
Route::get('/page/{slug}', [front::class,'page'])->name('front.page');
Route::get('updated_memberlist', [MemberPanel::class,'memberlist'])->name('member.list');
Route::get('founding-member', [MemberPanel::class,'foundingMember'])->name('foundmember.list');
Route::get('executive-session-member', [MemberPanel::class,'executiveSession'])->name('exe-session-list');
Route::get('/executive-member{slug}', [MemberPanel::class,'executiveMember'])->name('exe-member-list');
Route::get('updated_memberlist/{letter}', [MemberPanel::class,'memberlist'])->name('searchByLetter');
Route::get('terms-condition', [MemberPanel::class,'termsConditon'])->name('terms');

Route::get('/club-dues', [front::class,'club_dues'])->name('club_dues');

// photo and video gallery
Route::get('photo_gallery', [media::class,'pGallery'])->name('pGallery');
Route::get('/album/{slug}', [media::class,'album'])->name('album');
Route::get('/photo/{slug}', [media::class,'photo'])->name('photo');
Route::get('video_gallery', [media::class,'vGallery'])->name('vGallery');
Route::get('/vAlbum/{slug}', [media::class,'videoAlbum'])->name('vAlbum');
Route::get('/video/{slug}', [media::class,'video'])->name('video');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        
        //Adnin profile
        Route::get('/profile', [profile::class,'adminProfile'])->name('admin.profile');
        Route::post('/profile', [profile::class,'adminProfile'])->name('admin.profile.update');
        Route::post('/profile-update', [profile::class,'aProfileUpdate'])->name('admin.profile.up');
        
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);
        Route::resource('country',country::class,['as'=>'admin']);
        Route::resource('division',division::class,['as'=>'admin']);
        Route::resource('district',district::class,['as'=>'admin']);
        Route::resource('upazila',upazila::class,['as'=>'admin']);
        Route::resource('thana',thana::class,['as'=>'admin']);
        
        
        Route::resource('slider',SliderController::class,['as'=>'admin']);
        Route::resource('ourMember',member::class,['as'=>'admin']);
        Route::resource('notice',notice::class,['as'=>'admin']);
        Route::resource('facilities',facilities::class,['as'=>'admin']);
        Route::resource('year',year::class,['as'=>'admin']);
        Route::resource('pGalleryCat',pGalleryCat::class,['as'=>'admin']);
        Route::resource('pGallery',pGallery::class,['as'=>'admin']);
        Route::get('pGallerydelete', [pGallery::class, 'delete'])->name('admin.image.delete');
        Route::resource('settings',settings::class,['as'=>'admin']);
        Route::resource('bank',bank::class,['as'=>'admin']);
        Route::resource('tag',tag::class,['as'=>'admin']);
        Route::resource('vgallery',vGallery::class,['as'=>'admin']);
        Route::resource('vgalleryCat',vGalleryCat::class,['as'=>'admin']);
        Route::resource('blogcategory',blogcat::class,['as'=>'admin']);
        Route::resource('blog',blog::class,['as'=>'admin']);
        Route::resource('benefit',benefit::class,['as'=>'admin']);
        Route::resource('ppurpose',ppurpose::class,['as'=>'admin']);
        Route::resource('feeCollection',feeCollection::class,['as'=>'admin']);
        Route::resource('othersPay',othersPay::class,['as'=>'admin']);
        Route::resource('creason',creason::class,['as'=>'admin']);
        Route::resource('mcreason',mcreason::class,['as'=>'admin']);
        Route::resource('contact',contact::class,['as'=>'admin']);
        Route::resource('terms',terms::class,['as'=>'admin']);
        Route::resource('scrollN',scrollN::class,['as'=>'admin']);
        Route::resource('vNotice',vNotice::class,['as'=>'admin']);
        Route::resource('tdue',tdue::class,['as'=>'admin']);
        Route::resource('foundCommittee',foundCommittee::class,['as'=>'admin']);
        Route::resource('committeeSession',committeeSession::class,['as'=>'admin']);
        Route::resource('exeCommittee',exeCommittee::class,['as'=>'admin']);
        Route::resource('page',page::class,['as'=>'admin']);
        Route::post('image-upload', [page::class, 'storeImage'])->name('image.upload');
        Route::get('gs-approved-member', [member::class, 'gsecretaryApproved'])->name('admin.gs_approve_member');
        Route::get('approved-member', [member::class, 'approvedMember'])->name('admin.approve_member');
        Route::get('approved-member-print', [member::class, 'approvedMemberPrint'])->name('admin.approve_member_print');
        Route::get('archive-member', [member::class, 'archiveMember'])->name('admin.archive_member');
        Route::get('archive-member-print', [member::class, 'archiveMemberPrint'])->name('admin.archive_member_print');
        Route::get('front_menu', [frontMenu::class, 'index'])->name('admin.front_menu.index');
        Route::post('menu_save_update/{id?}', [frontMenu::class, 'save_update'])->name('admin.front_menu.save');
        Route::get('front_menu/mss', [frontMenu::class, 'mss'])->name('admin.front_menu.mss');
        Route::get('front_menu/delete/{id}', [frontMenu::class, 'destroy'])->name('admin.front_menu.detroy');
        Route::get('trans-history/{id}', [member::class, 'transHistory'])->name('admin.trans_history');
        Route::get('trans-history-all', [member::class, 'transHistoryAll'])->name('admin.trans_history_all');

        //member search
        Route::get('/member-search', [foundCommittee::class,'search'])->name('admin.member_search');
        Route::get('/member_search_data', [foundCommittee::class,'member_search_data'])->name('admin.member_search_data');

        Route::get('/get-member', [feeCollection::class, 'getMember'])->name('admin.getMember');

    });
});

Route::group(['middleware'=>isChairman::class],function(){
    Route::prefix('chairman')->group(function(){
        Route::get('/dashboard', [dash::class,'chairmanDashboard'])->name('chairman.dashboard');
        Route::get('gs-approved-member', [member::class, 'gsecretaryApproved'])->name('chairman.gs_approve_member');
        Route::get('approved-member', [member::class, 'approvedMember'])->name('chairman.approve_member');
        Route::get('approved-member-print', [member::class, 'approvedMemberPrint'])->name('chairman.approve_member_print');
        Route::get('archive-member', [member::class, 'archiveMember'])->name('chairman.archive_member');
        Route::get('archive-member-print', [member::class, 'archiveMemberPrint'])->name('chairman.archive_member_print');
        Route::get('deleted-member', [member::class, 'deletedMember'])->name('chairman.deleted_member');
        Route::resource('ourMember',member::class,['as'=>'chairman']);
        Route::get('to-approve/{id}', [member::class, 'approval'])->name('chairman.to_approve_member');
        Route::post('to-approve-update/{id}', [member::class, 'memberApprov'])->name('chairman.to_approve_update');
        Route::get('to-approve-cancel/{id}', [member::class, 'approvalCancel'])->name('chairman.to_approve_cancel_member');
        Route::post('to-approve-cancel-update/{id}', [member::class, 'memberApprovCancel'])->name('chairman.to_approve_cancel');
        Route::resource('users',user::class,['as'=>'chairman']);
        Route::get('trans-history/{id}', [member::class, 'transHistory'])->name('chairman.trans_history');
        Route::get('trans-history-all', [member::class, 'transHistoryAll'])->name('chairman.trans_history_all');

        //chairman profile
        Route::get('/profile', [profile::class,'ownerProfile'])->name('chairman.profile');
        Route::post('/profile', [profile::class,'ownerProfile'])->name('chairman.profile.update');

        // sms panel
        Route::get('/get-sms-page', [smsPanel::class,'get_sms_panel'])->name('chairman.get_sms_page');
        Route::post('/sms-send', [smsPanel::class,'sendSms'])->name('chairman.sms_send');
    });
});

Route::group(['middleware'=>isGeneralSecretary::class],function(){
    Route::prefix('generalsecretary')->group(function(){
        Route::get('/dashboard', [dash::class,'generalsecretaryDashboard'])->name('generalsecretary.dashboard');
        Route::get('gs-approved-member', [member::class, 'gsecretaryApproved'])->name('generalsecretary.gs_approve_member');
        Route::get('approved-member', [member::class, 'approvedMember'])->name('generalsecretary.approve_member');
        Route::get('approved-member-print', [member::class, 'approvedMemberPrint'])->name('generalsecretary.approve_member_print');
        Route::get('archive-member', [member::class, 'archiveMember'])->name('generalsecretary.archive_member');
        Route::get('archive-member-print', [member::class, 'archiveMemberPrint'])->name('generalsecretary.archive_member_print');
        Route::resource('ourMember',member::class,['as'=>'generalsecretary']);
        Route::get('to-approve/{id}', [member::class, 'approval'])->name('generalsecretary.to_approve_member');
        Route::post('to-approve-update/{id}', [member::class, 'memberApprov'])->name('generalsecretary.to_approve_update');
        Route::resource('users',user::class,['as'=>'generalsecretary']);
        Route::get('trans-history/{id}', [member::class, 'transHistory'])->name('generalsecretary.trans_history');
        Route::get('trans-history-all', [member::class, 'transHistoryAll'])->name('generalsecretary.trans_history_all');

        //generalsecretary profile
        Route::get('/profile', [profile::class,'ownerProfile'])->name('generalsecretary.profile');
        Route::post('/profile', [profile::class,'ownerProfile'])->name('generalsecretary.profile.update');

        // sms panel
        Route::get('/get-sms-page', [smsPanel::class,'get_sms_panel'])->name('generalsecretary.get_sms_page');
        Route::post('/sms-send', [smsPanel::class,'sendSms'])->name('generalsecretary.sms_send');

    });
});

Route::group(['middleware'=>isSalesmanager::class],function(){
    Route::prefix('salesmanager')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanagerDashboard'])->name('salesmanager.dashboard');

    });
});
Route::group(['middleware'=>isMember::class],function(){
    Route::prefix('member')->group(function(){
        Route::get('/loggedMem', [dash::class,'memDashboard'])->name('member.memdashboard');
        Route::get('/loggedMember', [dash::class,'memberDashboard'])->name('member.dashboard');
        Route::get('/profile', [MemberPanel::class,'memberProfile'])->name('member.profile');
        Route::post('/profileUpdate/update', [MemberPanel::class,'memberProfileUpdate'])->name('profile.update');
        Route::get('/password_change', [MemberPanel::class,'memberPassword'])->name('member.password');
        Route::post('/password_update', [MemberPanel::class,'mem_pass_update'])->name('member.passwordUpdate');
        Route::get('/memberPrint', [MemberPanel::class,'mem_regi_success'])->name('member.registration.success');

    });
});


