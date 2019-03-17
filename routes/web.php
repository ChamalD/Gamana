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
    return view('welcome');
});

Auth::routes();

Route::resource('comments','CommentController');




Route::get('/{name}',function(){
    return redirect('/');
})->where('name','[A-Za-z]+');

Route::get('/contact', function () {
    return view('contact');
});


Route::resource('plane_search','SearchFlightController');
Route::post('plane_search/search', 'SearchFlightController@search')->name('plane_search.search');


Route::resource('hotel_search','SearchHotelController');
Route::post('hotel_search/search', 'SearchHotelController@search')->name('hotel_search.search');

Route::resource('travel_packages','PackageController');
Route::resource('travel_partner','TravelPartnerController');





Route::middleware(['auth'])->group(function() {

    Route::post('plane_schedules/review', 'PlaneScheduleController@review')->name('plane_schedules.review');
    Route::post('plane_schedules/checker', 'PlaneScheduleController@checker')->name('plane_schedules.checker');
    Route::post('plane_schedules/search', 'PlaneScheduleController@search')->name('plane_schedules.search');
    Route::resource('plane_schedules', 'PlaneScheduleController');



    Route::post('hotel_booking/search', 'HotelBookingController@search')->name('hotel_booking.search');
    Route::post('hotel_booking/view', 'HotelBookingController@view')->name('hotel_booking.view');
    Route::post('hotel_booking/review', 'HotelBookingController@review')->name('hotel_booking.review');
    Route::post('hotel_booking/checker', 'HotelBookingController@checker')->name('hotel_booking.checker');
    Route::get('hotel_booking/allHotel', 'HotelBookingController@allHotel')->name('hotel_booking.allHotel');
    Route::post('hotel_booking/addRoom', 'HotelBookingController@addRoom')->name('hotel_booking.addRoom');
    Route::post('hotel_booking/results', 'HotelBookingController@results')->name('hotel_booking.results');

    Route::resource('visiting_place', 'VisitingPlaceController');
    Route::resource('hotel_booking', 'HotelBookingController');

    Route::get('visiting_place/get/{place}/{index_id}/{name}', ['uses' => 'VisitingPlaceController@check']);

});
