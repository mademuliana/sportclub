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
 
 
Route::middleware(['auth'])->group(function () {
    // routing ke view welcome
    Route::get('/', function () {
        return view('/auth/login');
    });
    
    Route::post('/logout', 'LoginController@logout');
    // routing ke view list
    Route::get('/list', 'IndexController@gotoList');
    
    // routing ke page view my-profile
    Route::get('/profile/my-profile', 'ProfileController@gotoMyProfile');
    // routing ke page view login
    Route::get('/profile/login', 'ProfileController@gotoLogin');
    // routing ke page view register
    Route::get('/profile/register', 'ProfileController@gotoRegister');
    
    // routing ke page view form-input-anggaran
    Route::get('/anggota/form-input-anggaran', 'AnggaranController@gotoFormInputAnggaran');

<<<<<<< HEAD
    // AUTH
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
    
    
    Route::get('/', 'HomeController@index')->name('home');
    
    // middleware gorup, pilah2 route yang bisa diakses per masing2 jenis user
    
    Route::group(['middleware' => 'super'], function()
    {

        Route::get('logout', 'LoginController@logout');
        
        // routing ke page view super admin
        Route::get('/dashboard/super-admin', 'DashboardController@gotoDashboardSuperAdmin');
        // route untuk method search kegiatan
        Route::get('/dashboard/super-admin/search-kegiatan', 'DashboardController@searchKegiatanSuperAdmin');
        // route untuk method search sport club
        Route::get('/dashboard/super-admin/search-sport-club', 'DashboardController@searchSportClubSuperAdmin');
    
        // routing ke page view sport-club
        Route::get('/sport-club/sport-club/{id}', 'SportClubController@gotoSportClub');
        // route untuk method search kegiatan
        Route::get('/sport-club/sport-club/{id}/searchKegiatan', 'SportClubController@searchKegiatan');
        // route untuk method search anggota
        Route::get('/sport-club/sport-club/{id}/searchAnggota', 'SportClubController@searchAnggota');
        // route untuk method search inventaris
        Route::get('/sport-club/sport-club/{id}/searchInventaris', 'SportClubController@searchInventaris');
        
        // routing ke page view list-anggota
        Route::get('/anggota/list-anggota', 'AnggotaController@gotoListAnggota');
        // routing ke page view form-input-anggota
        Route::get('/anggota/form-input-anggota', 'AnggotaController@gotoFormInputAnggota');
        // routing ke method show selected anggota
        Route::get('/anggota/{id}', 'AnggotaController@showCurrentAnggota');
        // routing ke method update selected anggota
        Route::put('/anggota/{id}', 'AnggotaController@update');
        // routing untuk method delete selected anggota
        Route::delete('/anggota/delete-super/{id}', 'AnggotaController@destroySuper');
        // route untuk method CREATE new anggota
        Route::post('/anggota/list-anggota', 'AnggotaController@store');
        // route untuk method search anggota
        Route::get('/anggota/list-anggota/search', 'AnggotaController@search');
        // route untuk method detail anggota
        Route::get('/anggota/detail/{id}', 'AnggotaController@showDetailAnggota');
        Route::put('/anggota/approve-super/{id}', 'AnggotaController@approveAnggotaSuper');
        Route::delete('/anggota/delete-super/{id}', 'AnggotaController@destroySuper');
        Route::put('/anggota/nonaktif/{sport}/{id}', 'AnggotaController@nonaktifSuper');
        Route::put('/anggota/aktif/{sport}/{id}', 'AnggotaController@aktifSuper');

        // routing ke page view list-club
        Route::get('/club/list-club', 'ClubController@gotoListClub');
        // routing ke page view form-input-club
        Route::get('/club/form-input-club', 'ClubController@gotoFormInputClub');
        // routing ke method show selected club
        Route::get('/club/{id}', 'ClubController@showCurrentClub');
        // routing ke method update selected club
        Route::put('/club/{id}', 'ClubController@update');
        // routing untuk method delete selected club
        Route::delete('/club/{id}', 'ClubController@destroy');
        // route untuk method CREATE new club
        Route::post('/club/list-club', 'ClubController@store');
        // route untuk method search club
        Route::get('/club/list-club/search', 'ClubController@search');
=======

Route::middleware(['auth'])->group(function () {
// routing ke view welcome
Route::get('/', function () {
    return view('/auth/login');
});

Route::post('/logout', 'LoginController@logout');
// routing ke view list
Route::get('/list', 'IndexController@gotoList'); 
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae

        Route::put('/club/nonaktif/{id}', 'ClubController@nonaktif');
        Route::put('/club/aktif/{id}', 'ClubController@aktif');
    
        // routing ke page view list-kegiatan
        Route::get('/kegiatan/list-kegiatan', 'KegiatanController@gotoListKegiatan');
        // routing ke page view list-kegiatan
        Route::get('/kegiatan/list-kegiatan-approve', 'KegiatanController@gotoListKegiatanApprove');
        // routing ke page view form-input-kegiatan
        Route::get('/kegiatan/form-input-kegiatan', 'KegiatanController@gotoFormInputKegiatan');
        // routing ke method show selected kegiatan incedental
        Route::get('/kegiatan/incedental/{id}', 'KegiatanController@showCurrentKegiatanIncedental');
        // routing ke method show selected kegiatan rutin
        Route::get('/kegiatan/rutin/{id}', 'KegiatanController@showCurrentKegiatanRutin');
        // routing ke method update selected kegiatan incedental
        Route::put('/kegiatan/incedental/{id}', 'KegiatanController@updateIncedental');
        // routing ke method update selected kegiatan rutin
        Route::put('/kegiatan/rutin/{id}', 'KegiatanController@updateRutin');
        // routing ke method approved selected kegiatan
        Route::put('/kegiatan/approved/{id}', 'KegiatanController@approveKegiatan');
        // routing ke method not-approved selected kegiatan
        Route::put('/kegiatan/not-approved/{id}', 'KegiatanController@notApproveKegiatan');
        // routing ke method tinjau Ulang Kegiatan selected kegiatan
        Route::put('/kegiatan/tinjau-ulang/{id}', 'KegiatanController@tinjauUlangKegiatan');
        // routing untuk method delete selected kegiatan
        Route::delete('/kegiatan/{id}', 'KegiatanController@destroy');
        // routing untuk method create new kegiatan Incidental
        Route::post('/kegiatan/incidental', 'KegiatanController@storeIncidental');
        // routing untuk method create new kegiatan rutin
        Route::post('/kegiatan/rutin', 'KegiatanController@storeRutin');
        // route untuk method search kegiatan
        Route::get('/kegiatan/list-kegiatan/search', 'KegiatanController@search');
        // route untuk method search kegiatan approved
        Route::get('/kegiatan/list-kegiatan/searchApproved', 'KegiatanController@searchApproved');
        // route untuk method detail kegiatan
        Route::get('/kegiatan/detail/{id}', 'KegiatanController@showDetailKegiatan');
    
        // routing ke page view form-input-presensi
        Route::get('/presensi/form-input-presensi/{id}', 'PresensiController@gotoFormInputPresensi');
        // routing ke method update selected presensei dan kegiatan
        Route::put('/presensi/update-presensi/{id}', 'PresensiController@updatePresensi');
    
        // routing ke page view list-inventaris
        Route::get('/inventaris/list-inventaris', 'InventarisController@gotoListInventaris');
        // routing ke page view form-input-kegiatan
        Route::get('/inventaris/form-input-inventaris', 'InventarisController@gotoFormInputInventaris');
        // routing ke method show selected kegiatan
        Route::get('/inventaris/{id}', 'InventarisController@showCurrentInventaris');
        // routing ke method update selected kegiatan
        Route::put('/inventaris/{id}', 'InventarisController@update');
        // routing untuk method delete selected kegiatan
        Route::delete('/inventaris/{id}', 'InventarisController@destroy');
        // routing untuk method create new kegiatan
        Route::post('/inventaris/list-inventaris', 'InventarisController@store');
        // route untuk method search inventaris
        Route::get('/inventaris/list-inventaris/search', 'InventarisController@search');
        // route untuk method detail inventaris
        Route::get('/inventaris/detail/{id}', 'InventarisController@showDetailInventaris');
        
    });

<<<<<<< HEAD
    Route::group(['middleware' => ['admin' OR 'super']], function()
    {  
        Route::get('logout', 'LoginController@logout');
    
        // routing ke page view pic
        Route::get('/dashboard/pic', 'DashboardController@gotoDashboardPic');
        // route untuk method search kegiatan
        Route::get('/dashboard/pic/search-kegiatan', 'DashboardController@searchKegiatanPic');
        // route untuk method search anggota
        Route::get('/dashboard/pic/search-anggota', 'DashboardController@searchAnggotaPic');
        // route untuk method search inventaris
        Route::get('/dashboard/pic/search-inventaris', 'DashboardController@searchInventarisPic');

        // routing ke page view list-kegiatan-pic
        Route::get('/kegiatan/list-kegiatan-pic/{id}', 'KegiatanController@gotoListKegiatanPic');
        // route untuk method search kegiatan-pic
        Route::get('/kegiatan/list-kegiatan-pic/search/{id}', 'KegiatanController@searchPic');
        // route untuk method detail kegiatan-pic
        Route::get('/kegiatan/detail-kegiatan-pic/{id}', 'KegiatanController@showDetailKegiatanPic');
        // routing untuk method create new kegiatan rutin pic
        Route::post('/kegiatan/rutin-pic', 'KegiatanController@storeRutinPic');
        // routing ke page view form-input-kegiatan-pic
        Route::get('/kegiatan/form-input-kegiatan-pic/{id}', 'KegiatanController@gotoFormInputKegiatanPic');
        // routing untuk method create new kegiatan Incidental
        Route::post('/kegiatan/incidental-pic', 'KegiatanController@storeIncidentalPic');
        // routing untuk method delete selected kegiatan
        Route::delete('/kegiatan/pic/{id}', 'KegiatanController@destroyPic');
        // routing ke method show selected kegiatan incedental
        Route::get('/kegiatan/incedental-pic/{sportid}/{id}', 'KegiatanController@showCurrentKegiatanIncedentalPic');
        // routing ke method show selected kegiatan rutin
        Route::get('/kegiatan/rutin-pic/{sportid}/{id}', 'KegiatanController@showCurrentKegiatanRutinPic');
        // routing ke method update selected kegiatan incedental
        Route::put('/kegiatan/incedental-pic/{id}', 'KegiatanController@updateIncedentalPic');
        // routing ke method update selected kegiatan rutin
        Route::put('/kegiatan/rutin-pic/{id}', 'KegiatanController@updateRutinPic');
        Route::get('/kegiatan/list-kegiatan-pic-all', 'KegiatanController@gotoListKegiatanPicAll');

    
        // routing ke page view form-input-presensi
        Route::get('/presensi/form-input-presensi-pic/{id}', 'PresensiController@gotoFormInputPresensiPic');
        // routing ke method update selected presensei dan kegiatan
        Route::put('/presensi/update-presensi-pic/{id}', 'PresensiController@updatePresensiPic');

        Route::get('/list-inventaris-pic-all', 'KegiatanController@gotoListInventarisPicAll');

        // routing ke page view list-inventaris-pic
        Route::get('/inventaris/list-inventaris-pic/{id}', 'InventarisController@gotoListInventarisPic');
        // route untuk method search inventaris pic
        Route::get('/inventaris/list-inventaris-pic/search/{id}', 'InventarisController@searchPic');
        // route untuk method detail inventaris pic
        Route::get('/inventaris/detail-inventaris-pic/{id}', 'InventarisController@showDetailInventarisPic');
        // routing ke page view form-input-kegiatan
        Route::get('/inventaris/form-input-inventaris-pic/{id}', 'InventarisController@gotoFormInputInventarisPic');
        // routing untuk method create new inventaris
        Route::post('/inventaris/list-inventaris-pic', 'InventarisController@storePic');
        // routing untuk method delete selected inventaris
        Route::delete('/inventaris/pic/{id}', 'InventarisController@destroyPic');
        // routing ke method show selected inventaris
        Route::get('/inventaris/pic/{id}', 'InventarisController@showCurrentInventarisPic');
        // routing ke method update selected inventaris
        Route::put('/inventaris/pic/{id}', 'InventarisController@updatePic');

        // routing ke page view list-anggota-pic
        Route::get('/anggota/list-anggota-pic/{id}', 'AnggotaController@gotoListAnggotaPic');
        Route::get('/anggota/list-all-anggota-pic/all', 'AnggotaController@gotoListAnggotaPicAll');
        // route untuk method search anggota-pic
        Route::get('/anggota/list-anggota-pic/search/{id}', 'AnggotaController@searchPic');
        // route untuk method detail anggota-pic
        Route::get('/anggota/detail-anggota-pic/{id}', 'AnggotaController@showDetailAnggotaPic');
        Route::put('/anggota/approve-admin/{id}', 'AnggotaController@approveAnggota');
        Route::put('/anggota/nonaktif/{id}', 'AnggotaController@nonaktifAdmin');
        Route::put('/anggota/aktif/{id}', 'AnggotaController@aktifAdmin');
    });
    
        //halaman member
        //
        //
        Route::get('logout', 'LoginController@logout');
    
        // routing ke page view user
        Route::get('/dashboard/user', 'DashboardController@gotoDashboardUser');
        // routing untuk method ikut event
        Route::post('/dashboard/user/join-event/{id}', 'DashboardController@storeJoinEvent');
        //  routing untuk method batal ikut event
        Route::delete('/dashboard/user/unjoin-event/{id}', 'DashboardController@UnjoinEvent');
        
        Route::get('/user/user', 'UserController@gotoUser');
        // route untuk method search sport club
        Route::get('/user/user/search-kegiatan', 'UserController@search');

        Route::get('/profile/my-profile', 'ProfileController@gotoMyProfile');
        
        // routing ke page view list-kegiatan
        Route::get('/kegiatan/list-kegiatan-member', 'KegiatanController@gotoListKegiatanMember');
        // routing ke page view list-keikutsertaan
        Route::get('/kegiatan/list-keikutsertaan', 'KegiatanController@gotoListKeikutsertaan');
        // route untuk method search kegiatan
        Route::get('/kegiatan/list-kegiatan-member/search', 'KegiatanController@searchMember');
        // route untuk method detail kegiatan
        Route::get('/kegiatan/detail-kegiatan-member/{id}', 'KegiatanController@showDetailKegiatanMember');
        
    
        // routing ke page view sport list
        Route::get('/sport/list-sport', 'SportController@gotoListSport');
        // routing untuk method ikut sport club
        Route::post('/sport/new-member/{id}', 'SportController@storeNewMember');
    
        // routing ke page view sport-club
        Route::get('/sport-club/sport-club/{id}', 'SportClubController@gotoSportClub');
        // route untuk method unjoin sportclub
        // Route::delete('/sport/delete-member/{id}', 'SportController@deleteMember');
        // route untuk method search kegiatan
        Route::get('/sport-club/sport-club/{id}/searchKegiatan', 'SportClubController@searchKegiatan');
        // route untuk method search anggota
        Route::get('/sport-club/sport-club/{id}/searchAnggota', 'SportClubController@searchAnggota');
        // route untuk method search inventaris
        Route::get('/sport-club/sport-club/{id}/searchInventaris', 'SportClubController@searchInventaris');
        //
        //
        //
    
});

Route::get('logout', 'LoginController@logout');
Route::get('/register', 'RegistrationController@show')->name('register')->middleware('guest');
Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');
 
Route::post('/register', 'RegistrationController@register');
Route::post('/login', 'LoginController@authenticate');  
Route::post('/', 'LoginController@authenticate');
Route::post('/home', 'LoginController@show');
=======
// routing ke page view form-input-anggaran
Route::get('/anggota/form-input-anggaran', 'AnggaranController@gotoFormInputAnggaran'); 

// Belum bisa login dan register
// Route::get('/profile/login',  'AuthController@loginForm')->name('login');
// Route::post('/login',  'AuthController@login');

// Route::get('/logout',  'AuthController@logout');
// Auth::routes();

// AUTH
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');


Route::get('/', 'HomeController@index')->name('home');

// middleware gorup, pilah2 route yang bisa diakses per masing2 jenis user
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{   
    Route::get('logout', 'LoginController@logout');

    // routing ke page view pic
    Route::get('/dashboard/pic', 'DashboardController@gotoDashboardPic');
    // route untuk method search kegiatan
    Route::get('/dashboard/pic/search-kegiatan', 'DashboardController@searchKegiatanPic');
    // route untuk method search anggota
    Route::get('/dashboard/pic/search-anggota', 'DashboardController@searchAnggotaPic');
    // route untuk method search inventaris
    Route::get('/dashboard/pic/search-inventaris', 'DashboardController@searchInventarisPic');

    Route::get('/user/user', 'UserController@gotoUser'); 
    // route untuk method search sport club
    Route::get('/user/user/search-kegiatan', 'UserController@search');

     // routing ke page view sport-club
     Route::get('/sport-club/sport-club/{id}', 'SportClubController@gotoSportClub');
     // route untuk method search kegiatan
     Route::get('/sport-club/sport-club/{id}/searchKegiatan', 'SportClubController@searchKegiatan');
     // route untuk method search anggota
     Route::get('/sport-club/sport-club/{id}/searchAnggota', 'SportClubController@searchAnggota');
     // route untuk method search inventaris
     Route::get('/sport-club/sport-club/{id}/searchInventaris', 'SportClubController@searchInventaris');

     // routing ke page view list-kegiatan
    Route::get('/kegiatan/list-kegiatan', 'KegiatanController@gotoListKegiatan');
    // routing ke page view list-kegiatan
    Route::get('/kegiatan/list-kegiatan-approve', 'KegiatanController@gotoListKegiatanApprove');
    // routing ke page view form-input-kegiatan
    Route::get('/kegiatan/form-input-kegiatan', 'KegiatanController@gotoFormInputKegiatan');
    // routing ke method show selected kegiatan incedental
    Route::get('/kegiatan/incedental/{id}', 'KegiatanController@showCurrentKegiatanIncedental');
    // routing ke method show selected kegiatan rutin
    Route::get('/kegiatan/rutin/{id}', 'KegiatanController@showCurrentKegiatanRutin');
    // routing ke method update selected presensi based on selected kegiatan
    Route::put('/kegiatan/update-presensi', 'KegiatanController@updatePresensi');
    // routing ke method update selected kegiatan incedental
    Route::put('/kegiatan/incedental/{id}', 'KegiatanController@updateIncedental');
    // routing ke method update selected kegiatan rutin
    Route::put('/kegiatan/rutin/{id}', 'KegiatanController@updateRutin');
    // routing untuk method delete selected kegiatan
    Route::delete('/kegiatan/{id}', 'KegiatanController@destroy');
    // routing untuk method create new kegiatan Incidental
    Route::post('/kegiatan/incidental', 'KegiatanController@storeIncidental');
    // routing untuk method create new kegiatan rutin
    Route::post('/kegiatan/rutin', 'KegiatanController@storeRutin');
    // route untuk method search kegiatan
    Route::get('/kegiatan/list-kegiatan/search', 'KegiatanController@search');
    // route untuk method detail kegiatan
    Route::get('/kegiatan/detail/{id}', 'KegiatanController@showDetailKegiatan');

    // routing ke page view form-input-presensi
    Route::get('/presensi/form-input-presensi/{id}', 'PresensiController@gotoFormInputPresensi');
    // routing ke method update selected presensei dan kegiatan
    Route::put('/presensi/update-presensi/{id}', 'PresensiController@updatePresensi');

    // routing ke page view list-inventaris
    Route::get('/inventaris/list-inventaris', 'InventarisController@gotoListInventaris');
    // routing ke page view form-input-kegiatan
    Route::get('/inventaris/form-input-inventaris', 'InventarisController@gotoFormInputInventaris');
    // routing ke method show selected kegiatan
    Route::get('/inventaris/{id}', 'InventarisController@showCurrentInventaris');
    // routing ke method update selected kegiatan
    Route::put('/inventaris/{id}', 'InventarisController@update');
    // routing untuk method delete selected kegiatan
    Route::delete('/inventaris/{id}', 'InventarisController@destroy');
    // routing untuk method create new kegiatan
    Route::post('/inventaris/list-inventaris', 'InventarisController@store');
    // route untuk method search inventaris
    Route::get('/inventaris/list-inventaris/search', 'InventarisController@search');
    // route untuk method detail inventaris
    Route::get('/inventaris/detail/{id}', 'InventarisController@showDetailInventaris');
});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
    Route::get('logout', 'LoginController@logout');

    // routing ke page view user
    Route::get('/dashboard/user', 'DashboardController@gotoDashboardUser');
    // routing untuk method ikut event
    Route::post('/dashboard/user/join-event/{id}', 'DashboardController@storeJoinEvent');

    Route::get('/user/user', 'UserController@gotoUser'); 
    // route untuk method search sport club
    Route::get('/user/user/search-kegiatan', 'UserController@search');

    // routing ke page view sport list
    Route::get('/sport/list-sport', 'SportController@gotoListSport');
    // routing untuk method ikut sport club
    Route::post('/sport/new-member/{id}', 'SportController@storeNewMember');

    // routing ke page view sport-club
    Route::get('/sport-club/sport-club/{id}', 'SportClubController@gotoSportClub');
    // route untuk method search kegiatan
    Route::get('/sport-club/sport-club/{id}/searchKegiatan', 'SportClubController@searchKegiatan');
    // route untuk method search anggota
    Route::get('/sport-club/sport-club/{id}/searchAnggota', 'SportClubController@searchAnggota');
    // route untuk method search inventaris
    Route::get('/sport-club/sport-club/{id}/searchInventaris', 'SportClubController@searchInventaris');
});

Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function()
{
    Route::get('logout', 'LoginController@logout');

    // routing ke page view super admin
    Route::get('/dashboard/super-admin', 'DashboardController@gotoDashboardSuperAdmin');
    // route untuk method search kegiatan
    Route::get('/dashboard/super-admin/search-kegiatan', 'DashboardController@searchKegiatanSuperAdmin');
    // route untuk method search sport club
    Route::get('/dashboard/super-admin/search-sport-club', 'DashboardController@searchSportClubSuperAdmin');

    // routing ke view list
    Route::get('/user/user', 'UserController@gotoUser'); 
    // route untuk method search sport club
    Route::get('/user/user/search-kegiatan', 'UserController@search');

     // routing ke page view sport-club
     Route::get('/sport-club/sport-club/{id}', 'SportClubController@gotoSportClub');
     // route untuk method search kegiatan
     Route::get('/sport-club/sport-club/{id}/searchKegiatan', 'SportClubController@searchKegiatan');
     // route untuk method search anggota
     Route::get('/sport-club/sport-club/{id}/searchAnggota', 'SportClubController@searchAnggota');
     // route untuk method search inventaris
     Route::get('/sport-club/sport-club/{id}/searchInventaris', 'SportClubController@searchInventaris');

     // routing ke page view list-anggota
    Route::get('/anggota/list-anggota', 'AnggotaController@gotoListAnggota');
    // routing ke page view form-input-anggota
    Route::get('/anggota/form-input-anggota', 'AnggotaController@gotoFormInputAnggota');
    // routing ke method show selected anggota
    Route::get('/anggota/{id}', 'AnggotaController@showCurrentAnggota');
    // routing ke method update selected anggota
    Route::put('/anggota/{id}', 'AnggotaController@update');
    // routing untuk method delete selected anggota
    Route::delete('/anggota/{id}', 'AnggotaController@destroy');
    // route untuk method CREATE new anggota
    Route::post('/anggota/list-anggota', 'AnggotaController@store');
    // route untuk method search anggota
    Route::get('/anggota/list-anggota/search', 'AnggotaController@search');
    // route untuk method detail anggota
    Route::get('/anggota/detail/{id}', 'AnggotaController@showDetailAnggota');

    // routing ke page view list-club
    Route::get('/club/list-club', 'ClubController@gotoListClub');
    // routing ke page view form-input-club
    Route::get('/club/form-input-club', 'ClubController@gotoFormInputClub');
    // routing ke method show selected club
    Route::get('/club/{id}', 'ClubController@showCurrentClub');
    // routing ke method update selected club
    Route::put('/club/{id}', 'ClubController@update');
    // routing untuk method delete selected club
    Route::delete('/club/{id}', 'ClubController@destroy');
    // route untuk method CREATE new club
    Route::post('/club/list-club', 'ClubController@store');
    // route untuk method search club
    Route::get('/club/list-club/search', 'ClubController@search');

     // routing ke page view list-kegiatan
     Route::get('/kegiatan/list-kegiatan', 'KegiatanController@gotoListKegiatan');
     // routing ke page view list-kegiatan
     Route::get('/kegiatan/list-kegiatan-approve', 'KegiatanController@gotoListKegiatanApprove');
     // routing ke page view form-input-kegiatan
     Route::get('/kegiatan/form-input-kegiatan', 'KegiatanController@gotoFormInputKegiatan');
     // routing ke method show selected kegiatan incedental
     Route::get('/kegiatan/incedental/{id}', 'KegiatanController@showCurrentKegiatanIncedental');
     // routing ke method show selected kegiatan rutin
     Route::get('/kegiatan/rutin/{id}', 'KegiatanController@showCurrentKegiatanRutin');
     // routing ke method update selected presensi based on selected kegiatan
     Route::put('/kegiatan/update-presensi', 'KegiatanController@updatePresensi');
     // routing ke method update selected kegiatan incedental
     Route::put('/kegiatan/incedental/{id}', 'KegiatanController@updateIncedental');
     // routing ke method update selected kegiatan rutin
     Route::put('/kegiatan/rutin/{id}', 'KegiatanController@updateRutin');
     // routing ke method approved selected kegiatan
     Route::put('/kegiatan/approved/{id}', 'KegiatanController@approveKegiatan');
     // routing ke method not-approved selected kegiatan
     Route::put('/kegiatan/not-approved/{id}', 'KegiatanController@notApproveKegiatan');
     // routing untuk method delete selected kegiatan
     Route::delete('/kegiatan/{id}', 'KegiatanController@destroy');
     // routing untuk method create new kegiatan Incidental
     Route::post('/kegiatan/incidental', 'KegiatanController@storeIncidental');
     // routing untuk method create new kegiatan rutin
     Route::post('/kegiatan/rutin', 'KegiatanController@storeRutin');
     // route untuk method search kegiatan
     Route::get('/kegiatan/list-kegiatan/search', 'KegiatanController@search');
     // route untuk method search kegiatan approved
     Route::get('/kegiatan/list-kegiatan/searchApproved', 'KegiatanController@searchApproved');
     // route untuk method detail kegiatan
     Route::get('/kegiatan/detail/{id}', 'KegiatanController@showDetailKegiatan');

    // routing ke page view form-input-presensi
    Route::get('/presensi/form-input-presensi/{id}', 'PresensiController@gotoFormInputPresensi');
    // routing ke method update selected presensei dan kegiatan
    Route::put('/presensi/update-presensi/{id}', 'PresensiController@updatePresensi');

     // routing ke page view list-inventaris
    Route::get('/inventaris/list-inventaris', 'InventarisController@gotoListInventaris');
    // routing ke page view form-input-kegiatan
    Route::get('/inventaris/form-input-inventaris', 'InventarisController@gotoFormInputInventaris');
    // routing ke method show selected kegiatan
    Route::get('/inventaris/{id}', 'InventarisController@showCurrentInventaris');
    // routing ke method update selected kegiatan
    Route::put('/inventaris/{id}', 'InventarisController@update');
    // routing untuk method delete selected kegiatan
    Route::delete('/inventaris/{id}', 'InventarisController@destroy');
    // routing untuk method create new kegiatan
    Route::post('/inventaris/list-inventaris', 'InventarisController@store');
    // route untuk method search inventaris
    Route::get('/inventaris/list-inventaris/search', 'InventarisController@search');
    // route untuk method detail inventaris
    Route::get('/inventaris/detail/{id}', 'InventarisController@showDetailInventaris');
});

});

Route::get('/register', 'RegistrationController@show')->name('register')->middleware('guest');
Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');

Route::post('/register', 'RegistrationController@register');
Route::post('/login', 'LoginController@authenticate');  
Route::post('/', 'LoginController@authenticate');  
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
