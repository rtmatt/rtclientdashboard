<?php
/**
 * Created by PhpStorm.
 * User: mattemrick
 * Date: 7/7/16
 * Time: 9:51 PM
 */
namespace RTMatt\MonthlyServiceClientDashboard\Controllers;
use Illuminate\Routing\Controller;
use RTMatt\MonthlyServiceClientDashboard\Traits\ShowsDashboard;

class ClientDashboardController extends Controller{
   use ShowsDashboard;
    public function test($client_id){

        $rt_client = \RTMatt\MonthlyService\Client::find($client_id);
        $key       = $rt_client->generateApiKey();
        $username  = $key->api_name;
        $password  = \Hash::make($key->api_secret_key);
        $client   = new Client([
            'base_uri' => 'http://dashboard.dev',
        ]);
        $response = $client->request('GET', route('client-services-summary'), [ 'auth' => [ $username, $password ] ]);
        $dashboard_data     = json_decode($response->getBody()->getContents());
        $auth = base64_encode("{$username}:{$password}");

        return view('rtdashboard::dashboard', compact('dashboard_data','rt_client','client_id','auth'));
    }
}