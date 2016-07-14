<?php
/**
 * Created by PhpStorm.
 * User: mattemrick
 * Date: 7/7/16
 * Time: 9:51 PM
 */
namespace RTMatt\MonthlyServiceClientDashboard\Controllers;

use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use RTMatt\MonthlyServiceClientDashboard\Traits\ShowsDashboard;

class ClientDashboardController extends Controller
{

    use ShowsDashboard;


    public function test($client_id=null)
    {
        if ( ! $client_id) {
            $rt_client = \RTMatt\MonthlyService\Client::first();
        } else {
            $rt_client = \RTMatt\MonthlyService\Client::find($client_id);
        }
        if ( ! $rt_client) {
            return "No client found";
        }
        $key            = $rt_client->api_key;
        $username       = $key->api_name;
        $password       = \Hash::make($key->api_secret_key);
        $client         = new Client([
            'base_uri' => config('rtclientdashboard.api_base_url'),
        ]);
        $response       = $client->request('GET', route('client-services-summary'),
            [ 'auth' => [ $username, $password ] ]);
        $dashboard_data = json_decode($response->getBody()->getContents());
        $auth           = base64_encode("{$username}:{$password}");

        return view('rtclientdashboard::dashboard', compact('dashboard_data', 'rt_client', 'client_id', 'auth'));
    }
}