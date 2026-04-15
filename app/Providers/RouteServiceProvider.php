<?php

namespace PMEexport\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use PMEexport\Models\Cae;
use PMEexport\Models\Certificate;
use PMEexport\Models\CertificateCategory;
use PMEexport\Models\Company;
use PMEexport\Models\CompanyAnnouncement;
use PMEexport\Models\CompanyCertificate;
use PMEexport\Models\Department;
use PMEexport\Models\District;
use PMEexport\Models\Product;
use PMEexport\Models\ProductCategory;
use PMEexport\Models\Province;
use PMEexport\Models\RequestAnnouncement;
use PMEexport\Models\User;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::bind('product', function ($value) {
            return Product::where('uuid', $value)->first();
        });

        Route::bind('productCategory', function ($value) {
            return ProductCategory::where('uuid', $value)->first();
        });

        Route::bind('department', function ($value) {
            return Department::where('uuid', $value)->first();
        });
        Route::bind('province', function ($value) {
            return Province::where('uuid', $value)->first();
        });
        Route::bind('cae', function ($value) {
            return Cae::where('uuid', $value)->first();
        });

        Route::bind('district', function ($value) {
            return District::where('uuid', $value)->first();
        });

        Route::bind('announcement', function ($value) {
            return CompanyAnnouncement::where('uuid', $value)->first();
        });
        Route::bind('announcement_request', function ($value) {
            return RequestAnnouncement::where('uuid', $value)->first();
        });
        Route::bind('certificate', function ($value) {
            return Certificate::where('uuid', $value)->first();
        });

        Route::bind('company', function ($value) {
            return Company::where('uuid', $value)->first();
        });
        Route::bind('user', function ($value) {
            return User::where('uuid', $value)->first();
        });

        Route::bind('certificateCategories', function ($value) {
            return CertificateCategory::where('uuid', $value)->first();
        });
    }

}
