<?php
/**
 * Created by PhpStorm.
 * User: mattemrick
 * Date: 7/7/16
 * Time: 9:56 PM
 */

namespace RTMatt\MonthlyServiceClientDashboard\Traits;


trait ShowsDashboard {
    use GetsDashboardData;
    public function showDashboard(){
       // $dashboard_data = $this->getDashboardArgs();
        return view('rtclientdashboard::dashboard-test');
    }
}