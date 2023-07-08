<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro("base_response", function ($data = [], $code = 200, $status = "OK", $message = "Success") {
            return response()->json([
                "responseCode" => $code,
                "responseStatus" => $status,
                "responseMessage" => $message,
                "data" => $data
            ], $code);
        });
    }
}
