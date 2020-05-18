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


//===ここから追加===
//①リスト一覧画面
Route::get('/','ListingsController@index');

//②リスト新規画面
Route::get('/new', 'ListingsController@new')->name('new');

//③リスト新規作成処理 
Route::post('/listings','ListingsController@store');

//===ここまで追加===
/* ======= 解説 =======
■ルートの定義とは、このURLでアクセスされた時は、このコントローラのアクションを呼び出してください」と定義します。
    ①の場合、「/」でアクセスされたら、ListingsControllerのindexアクションを呼び出してねという支持になります

Route::get('リクエストされたURL','呼び出すコントローラー名@処理するコントローラ名');

②リスト新規画面の「->name('new')」の記述は、ルートの名前を定義しています。これを名前付きルートといいます。
名前を定義しておくことで、コントローラやビューで定義した名前でパスの指定をすることができます。

*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listingsedit/{listing_id}','ListingsController@edit');

Route::post('/listing/edit','ListingsController@update');

Route::get('/listingsdelete/{listing_id}','ListingsController@destroy');

Route::get('/listing/{listing_id}/card/new', 'CardsController@new');

Route::post('/cards','CardsController@store');

Route::get('/listing/{listing_id}/card/{card_id}','CardsController@show');

Route::get('/cardsedit/listing/{listing_id}/card/{card_id}','CardsController@edit');

Route::post('/card/edit','CardsController@update');

Route::get('/cardsdelete/{card_id}','CardsController@destroy');