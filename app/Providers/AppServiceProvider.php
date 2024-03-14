<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable((new Language)->getTable())) {
        }
    }

    private function setDefaultLanguage(): void
    {
        $language = Language::findDefault();

        $language && app()->setLocale($language->id);
    }

    private function setFallbackLanguage(): void
    {
        $language = Language::findFallback();

        $language && app()->setFallbackLocale($language->id);
    }
}
