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


Route::group(['prefix' => 'company', 'middleware' => ['cors','auth:api']], function () {
    Route::get("/verifyIsCompany", ["as" => "api.company.verifyIsCompany", "uses" => "CompanyController@verifyIsCompany"]);

    Route::get("/certificates", ["as" => "api.company.certificates", "uses" => "CertificateController@getCertificatesFromCompany"]);
});

Route::group(['prefix' => 'certificates', 'middleware' => ['cors','auth:api']], function () {
    Route::get("/listOfCertificates", ["as" => "api.certificates.listOfCertificates", "uses" => "CertificateController@listOfCertificates"]);
    Route::get("/listOfCertificates/{certificate}", ["as" => "api.certificates.listOfCertificatesShow", "uses" => "CertificateController@listOfCertificatesShow"]);
    Route::post('/storeRequestCertificate', ["as"=>"api.certificates.storeRequestCertificateFromApp","uses" => "CertificateController@storeRequestCertificateFromApp"]);
});

Route::get("/list-certificates", ["as" => "api.company.listCertificates", "uses" => "CertificateController@listaCertificado"]);
Route::get("/products", ["as" => "api.company.listProd", "uses" => "ProductController@products"]);
