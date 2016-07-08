## Installation
### Clone Repo
from project root
```  
git clone git@bitbucket.org:redtrainws/monthlyserviceclientdashboard.git app/MonthlyServiceClientDashboard
```

### Add to Autoloader
in composer.json
```  
"autoload": {
    ...
    "psr-4": {
     ...
      "RTMatt\\MonthlyServiceClientDashboard\\": "app/MonthlyServiceClientDashboard"
    }
  },
```

```  
composer dumpautoload
```




### Add Service Provider
in config/app.php providers array:
```
\RTMatt\MonthlyServiceClientDashboard\Providers\MonthlyServiceClientDashboardServiceProvider::class
```


## Usage
Within whatever file you want to show the dashboard, include the following:

``` 
 @include('rtclientdashboard::components.dashboard-component')

```
and in the layout file before the closing body tag, include the following:

```  
@include('rtclientdashboard::partials.dashboard-scripts')
```







