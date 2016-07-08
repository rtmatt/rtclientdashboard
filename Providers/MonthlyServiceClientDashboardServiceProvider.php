<?php
namespace RTMatt\MonthlyServiceClientDashboard\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
class MonthlyServiceClientDashboardServiceProvider extends ServiceProvider{

    public function register()
    {
        $path = __DIR__ . '/../resources/views';
        $this->loadViewsFrom($path,'rtclientdashboard');

        $this->mergeConfigFrom(
            __DIR__.'/../config/rtclientdashboard.php', 'rtclientdashboard'
        );
    }
}