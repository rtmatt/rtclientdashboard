<?php
/**
 * Created by PhpStorm.
 * User: mattemrick
 * Date: 7/7/16
 * Time: 9:56 PM
 */

namespace RTMatt\MonthlyServiceClientDashboard\Traits;


trait ShowsDashboard {

    public function showDashboard(){
        $username = env('DASHBOARD_API_NAME');
        $password = env('DASHBOARD_API_KEY');
        if(empty($username) || empty( $password )){
            throw new \Exception('API credentials not set.');
        }
        $password  = \Hash::make($password);
        $client   = new \GuzzleHttp\Client([
            'base_uri' => 'http://dashboard.dev',
        ]);
        $response = $client->request('GET', route('client-services-summary'), [ 'auth' => [ $username, $password ] ]);
        $dashboard_data     = json_decode($response->getBody()->getContents());
        $auth = base64_encode("{$username}:{$password}");
        return view('rtclientdashboard::dashboard-test', compact('dashboard_data','auth'));
    }
}