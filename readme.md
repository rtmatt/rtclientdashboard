## Installation
### Via Composer

``` bash 
composer require rtmatt/rtclientdashboard //:dev-master
```
### Add Service Provider
in config/app.php providers array:
```
\RTMatt\MonthlyServiceClientDashboard\Providers\MonthlyServiceClientDashboardServiceProvider::class
```


## Usage
### Add includes
Within whatever file you want to show the dashboard, include the following:

``` 
 @include('rtclientdashboard::components.dashboard-component')

```
and in the layout file before the closing body tag, include the following:

```  
@include('rtclientdashboard::partials.dashboard-scripts')
```
as well as the following within the head section:

```  
@include('rtclientdashboard::partials.dashboard-styles')
```



###Add credentials
in your site's .env file:

```  
DASHBOARD_API_NAME=xxx
DASHBOARD_API_KEY=xxx
```

### publish assets

```  
php artisan vendor:publish --provider="RTMatt\MonthlyServiceClientDashboard\Providers\MonthlyServiceClientDashboardServiceProvider" --tag="public" --force

```
If you would like to make sure your public assets are always up-to-date, you can add this command to the post-update-cmd list in your composer.json file.


## Configuration

```  
DASHBOARD_API_URL //the base url for the API with which the dashboard talks
DASHBOARD_SUMMARY_API_ENDPOINT //the api endpoint where client service summaries live
```












