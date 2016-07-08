<?php
namespace RTMatt\MonthlyServiceClientDashboard\Providers;

use Illuminate\Support\ServiceProvider;
use RTMatt\MonthlyServiceClientDashboard\Traits\GetsDashboardData;

class MonthlyServiceClientDashboardServiceProvider extends ServiceProvider
{

    


    public function register()
    {
        $path = __DIR__ . '/../resources/views';
        $this->loadViewsFrom($path, 'rtclientdashboard');

        $this->mergeConfigFrom(__DIR__ . '/../config/rtclientdashboard.php', 'rtclientdashboard');
    }


    public function boot()
    {

        view()->composer('rtclientdashboard::components.dashboard-component', function ($view) {
            $credentials    = $this->getAPICredentials();
            $client         = new \GuzzleHttp\Client([
                'base_uri' => config('rtclientdashboard.api_base_url'),
            ]);
            $response       = $client->request('GET', config('rtclientdashboard.api_summary_endpoint'),
                [ 'auth' => [ $credentials['username'], $credentials['password'] ] ]);
            $dashboard_data = json_decode($response->getBody()->getContents());

            $view->with(compact('dashboard_data'));
        });

        view()->composer('rtclientdashboard::partials.dashboard-scripts', function ($view) {
            $credentials    = $this->getAPICredentials();
            $auth     = base64_encode("{$credentials['username']}:{$credentials['password']}");
            $view->with(compact('auth'));
        });
    }


    private function getAPICredentials()
    {
        $username = env('DASHBOARD_API_NAME');
        $password = env('DASHBOARD_API_KEY');
        if (empty( $username ) || empty( $password )) {
            throw new \Exception('API credentials not set.');
        }
        $password = \Hash::make($password);

        return compact('username', 'password');
    }
}