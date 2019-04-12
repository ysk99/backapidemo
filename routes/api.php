<?php

use Illuminate\Http\Request;
use App\Article;

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

Route::group(['middleware' => 'auth:api'], function() {
  // Route::get('articles', 'ArticleController@index');
  Route::post('articles/getListPagination', 'ArticleController@getListPagination');
  Route::get('articles/{id}', 'ArticleController@show');
  Route::post('articles/store', 'ArticleController@store');
  Route::post('articles/update', 'ArticleController@update');
  // Route::put('articles/{id}', 'ArticleController@update');
  Route::delete('articles/{id}', 'ArticleController@delete');
  Route::post('logout', 'Auth\LoginController@logout');
  // 电影网站新增 后端
  Route::post('newmsg/store', 'MovieController@store');
  Route::post('newmsg/update', 'MovieController@update');
  Route::delete('newmsg/delete/{id}', 'MovieController@delete');
  //前端照片上传 后端
  Route::post('files/upload', 'UploadController@upfile');

  // EO相关路由 后端
  Route::get('eo', 'EotimeController@index');
});

//直接路由操作，更改完控制器后
// Route::get('articles', function() {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return Article::all();
// });
//
// Route::get('articles/{id}', function($id) {
//     return Article::find($id);
// });
//
// Route::post('articles', function(Request $request) {
//     return Article::create($request->all);
// });
//
// Route::put('articles/{id}', function(Request $request, $id) {
//     $article = Article::findOrFail($id);
//     $article->update($request->all());
//
//     return $article;
// });
//
// Route::delete('articles/{id}', function($id) {
//     Article::find($id)->delete();
//
//     return 204;
// });
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
// 前端获取信息
Route::get('articles', 'ArticleController@index');
Route::get('movie/index', 'MovieController@index');
Route::post('files/upload', 'UploadController@upfile');
Route::post('getip', 'MovieController@getip');
