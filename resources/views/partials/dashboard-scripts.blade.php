<script src='/vendor/rtclientdashboard/js/dashboard.js'></script>
<script>
    new ClientDashboard({
        auth:'{{$auth}}'
        @if(env('DASHBOARD_API_URL'))
        ,api_base_url: '{{env('DASHBOARD_API_URL')}}'
        @endif
    });
</script>