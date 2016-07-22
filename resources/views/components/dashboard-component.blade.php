@if(!empty($dashboard_data))
    <div class="RT-Client_Dashboard" id="js--Client-Dashboard{!!isset($dashboard_id)?'_'.$dashboard_id:''!!}">
        <!-- Monthly Services Modal -->
        @include('rtclientdashboard::components.partials.modal')
        <div class="RT-Dashboard__Status-bar">
            <a class='BrandBar' href="http://www.designledge.com/" target="blank">&nbsp;</a>
            <!-- This wrapper is for everything in the status bar except the brand bar -->
            <div class="StatusBarContent clearfix">
                <!-- This wrapper is for everything in the status bar except the brand bar -->
                <div class="UsageContent">
                    <div class="UsageContent__row clearfix">
                        <div class="UsageContent__label UsageContent__label--monthly u--float-left-tablet-portrait-min">
                            <div class="DashboardIconLabel clearfix">
                                <img src='/vendor/rtclientdashboard/images/monthly-grey.svg' class="DashboardIconLabel__icon" alt="Monthly Hours">
                                <span class="DashboardIconLabel__text DashboardIconLabel__text">Monthly<br> Usage</span>
                            </div>
                        </div>
                        <div class="UsageContent__content u--float-left-tablet-portrait-min">
                            <div class="MonthWrap clearfix">
                                @foreach($dashboard_data->monthly as $key=>$month)
                                    <div class="month{!!$month->is_current_month?' current-month':''!!}" data-percent_used="{{$month->percentage_used}}" data-hours_used="{{$month->hours_used}}" data-hours_available="{{$month->hours_available}}">
                                        <span class="month-name js--Month-Name">{{$month->name}}</span>
                                        <div class="js--graph Month-Graph-Wrap" id="js--circle-{{$key}}{!!isset($dashboard_id)?'--dashboard-'.$dashboard_id:''!!}"></div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- END OF: 'MonthWrap' -->
                        </div>
                    </div>
                    <div class="UsageContent__row clearfix">
                        <div class="UsageContent__label UsageContent__label--yearly u--float-left-tablet-portrait-min">
                            <div class="DashboardIconLabel clearfix">
                                <img src='/vendor/rtclientdashboard/images/annual-grey.svg' class="DashboardIconLabel__icon" alt="Yearly Balance">
                                <span class="DashboardIconLabel__text">Yearly<br> Balance</span>
                            </div>
                        </div>
                        <div class="UsageContent__content u--float-left-tablet-portrait-min">
                            <div class="AnnualWrap js--annual_usage" data-year_percent_used="{{$dashboard_data->annual->percentage_used}}" data-year_hours_available="{{$dashboard_data->annual->hours_available}}" data-year_hours_used="{{$dashboard_data->annual->hours_used}}">
                                <div class="CurrentHourBalance js--Dashboard__annual-usage-value">
                                    <span class="CurrentHourBalance__balance js--Dashboard__annual-usage-text">{{$dashboard_data->annual->hours_used}}</span>
                                </div>
                                <div class="BalanceBar js--Dashboard__annual-usage-progress" data-usage="{{$dashboard_data->annual->percentage_used}}"></div>
                                <div class="TotalAnnualHours">
                                    <span class="TotalAnnualHours__total js--Dashboard__annual-usage-limit">{{$dashboard_data->annual->hours_available}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- This wrapper is for last backup, monthly services, priority alert -->
                <div class="StatusBarSecondaryContent clearfix">
                    <!-- This wrapper is for the last backup and monthly services -->
                    <div class="StatusBarSecondaryInformation u--float-left-tablet-portrait-min clearfix">
                        <div class="StatusBarSecondaryInformation__item clearfix">
                            <div class="u--inline-block">
                                <div class="DashboardIconLabel DashboardIconLabel--secondary-content clearfix u--float-left-tablet-portrait-min u--remove-float-desktop">
                                    <img class="DashboardIconLabel__icon u--remove-float-desktop u--margin-auto-desktop" src='/vendor/rtclientdashboard/images/backup-grey.svg' alt="Last Backup">
                                    <span class="DashboardIconLabel__text DashboardIconLabel__text--backup">Last Backup</span>
                                </div>
                                <p class="StatusBarSecondaryInformation__item-text u--remove-float-desktop clearfix js--Last-Backup-Text">
                                    {{$dashboard_data->last_backup}}
                                </p>
                            </div>
                        </div>
                        {{--@todo: add in admin mode controls ln:82 in __old__dashbboard-component.blade.php--}}

                        @if(isset($admin_mode))
                            <a class="StatusBarSecondaryInformation__item clearfix StatusBarSecondaryInformation__item--services" ng-click="clientDashboardController.logBackup()">
                                <div class="DashboardIconLabel DashboardIconLabel--secondary-content clearfix">
                                    <span class="Dashboard-background-icon DashboardIconLabel__icon u--remove-float-desktop u--margin-auto-desktop Dashboard-background-icon--log-backup">&nbsp;</span>
                                    <span class="DashboardIconLabel__text DashboardIconLabel__text--services">Log<br>Backup</span>
                                </div>
                            </a>
                        @else
                            <a class="StatusBarSecondaryInformation__item clearfix StatusBarSecondaryInformation__item--services js--Modal-Trigger" href="#" data-toggle="modal" data-target="#myModal">
                                <div class="DashboardIconLabel DashboardIconLabel--secondary-content clearfix">
                                    <span class="Dashboard-background-icon DashboardIconLabel__icon u--remove-float-desktop u--margin-auto-desktop Dashboard-background-icon--benefits">&nbsp;</span>
                                    <span class="DashboardIconLabel__text DashboardIconLabel__text--services">View Monthly<br>Benefits</span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <a class="StatusBarAlertButton u--float-left-tablet-portrait-min js--Dashboard__alert-toggle" href="#">
                        <div class="DashboardIconLabel DashboardIconLabel--secondary-content u--full-center-desktop clearfix">
                            @if(isset($admin_mode))
                                <img class="DashboardIconLabel__icon DashboardIconLabel__icon--priority js--PriorityAlert-Toggle__icon" src='/vendor/rtclientmanager/images/edit-white.svg' data-alt-src="/vendor/rtclientdashboard/images/icon-x.png" alt="Priority Alert">
                                <span class="DashboardIconLabel__text DashboardIconLabel__text--priority js--PriorityAlert-Toggle__text" data-toggle-template="Close">Edit</span>
                                @else
                            <img class="DashboardIconLabel__icon DashboardIconLabel__icon--priority js--PriorityAlert-Toggle__icon" src='/vendor/rtclientdashboard/images/alert-white.svg' data-alt-src="/vendor/rtclientdashboard/images/icon-x.png" alt="Priority Alert">
                            <span class="DashboardIconLabel__text DashboardIconLabel__text--priority js--PriorityAlert-Toggle__text" data-toggle-template="Close">Priority Alert</span>

                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <section class="RT-Dashboard-Form {!!!isset($admin_mode)?'RT-Dashboard-Form--priority':'RT-Dashboard-Form--admin'!!} clearfix js--Dashboard__alert-form">
            @if(isset($admin_mode))
                @include('rtclientmanager::partials.edit-form')
            @else
                <form class="js--Dashboard-Alert-Form" enctype="multipart/form-data">
                    <div class="RT-Dashboard-Form__row">
                        <div class="RT-Dashboard-Form__col-md-65 RT-Dashboard-Form__global-section RT-Dashboard-Form__global-section--description">
                            <fieldset class="RT-Dashboard-Form__section--what-happens u--margin-top-0">
                                <div class="RT-Dashboard-Form__row">
                                    <div class="RT-Dashboard-Form__col-tp-50">
                                        <label class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large" for="actualHappening">
                                            What's happening is
                                        </label>
                                        <textarea class="RT-Dashboard-Form__form-control" id="actualHappening" name="actual" required=""></textarea>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-50">
                                        <label class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large" for="expectedToHappen">
                                            What should happen is
                                        </label>
                                        <textarea class="RT-Dashboard-Form__form-control" id="expectedToHappen" name="expected" required=""></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large">This happens
                                </legend>
                                <div class="RT-Dashboard-Form__row">
                                    <div class="RT-Dashboard-Form__col-tp-25">
                                        <input class="RT-Dashboard-Form__frequency-option" type="radio" id="frequencyEveryTime" name="frequency" value="always">
                                        <label class="RT-Dashboard-Form__frequency-label u--margin-top-0" for="frequencyEveryTime">
                                            Every time
                                        </label>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-25">
                                        <input class="RT-Dashboard-Form__frequency-option" type="radio" id="frequencyOften" name="frequency" value="often">
                                        <label class="RT-Dashboard-Form__frequency-label" for="frequencyOften">
                                            Often
                                        </label>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-25">
                                        <input class="RT-Dashboard-Form__frequency-option" type="radio" id="frequencyOccasionally" name="frequency" value="occasionally">
                                        <label class="RT-Dashboard-Form__frequency-label" for="frequencyOccasionally">
                                            Occasionally
                                        </label>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-25">
                                        <input class="RT-Dashboard-Form__frequency-option" type="radio" id="frequencyOnlyOnce" name="frequency" value="once">
                                        <label class="RT-Dashboard-Form__frequency-label" for="frequencyOnlyOnce">
                                            Only once
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="RT-Dashboard-Form__section--when-using">
                                <legend class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large">When using
                                </legend>
                                <div class="RT-Dashboard-Form__row">
                                    <div class="RT-Dashboard-Form__col-tp-33">
                                        <input class="RT-Dashboard-Form__form-control u--margin-top-0" type="text" id="userDevice" name="user_device" placeholder="Device (ie. iPhone, PC)">
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-33">
                                        <input class="RT-Dashboard-Form__form-control" type="text" id="userOS" name="user_browser" placeholder="Browser (ie. Chrome, Safari)">
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-33">
                                        <input class="RT-Dashboard-Form__form-control" type="text" id="userBrowser" name="user_browser_ver" placeholder="Browser Version">
                                    </div>
                                </div>
                                {{--<button type="button" class="RT-Dashboard-Form__button RT-Dashboard-Form__button--browser-detect">--}}
                                    {{--Detect for me--}}
                                {{--</button>--}}
                            </fieldset>
                            {{--<fieldset>--}}
                                {{--<label class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large" for="fileAttach">--}}
                                    {{--Attach Screenshot--}}
                                    {{--<span class="u--light-text">(Optional)</span>--}}
                                {{--</label>--}}
                                {{--<input class="RT-Dashboard-Form__screenshot-input" type="file" id="fileAttach" name="attachment" accept="image/*">--}}
                            {{--</fieldset>--}}
                        </div>
                        <div class="RT-Dashboard-Form__col-md-35 RT-Dashboard-Form__global-section RT-Dashboard-Form__global-section--contact">
                            <fieldset class="RT-Dashboard-Form__section--contact-fieldset">
                                <legend class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large u--bottom-margin-25-mobile-min">
                                    Who should we contact about this?
                                </legend>
                                <div class="RT-Dashboard-Form__row">
                                    <div class="RT-Dashboard-Form__col-tp-33 RT-Dashboard-Form__col-md-100">
                                        <div class="RT-Dashboard-Form__form-group-horizontal">
                                            <label class="RT-Dashboard-Form__label" for="userName">Name</label>
                                            <input class="RT-Dashboard-Form__form-control" type="text" id="userName" name="contact_name" data-required="true">
                                        </div>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-33 RT-Dashboard-Form__col-md-100">
                                        <div class="RT-Dashboard-Form__form-group-horizontal">
                                            <label class="RT-Dashboard-Form__label" for="userEmail">Email</label>
                                            <input class="RT-Dashboard-Form__form-control" type="email" id="userEmail" name="contact_email" data-parsley-errors-container="#email-error-block">
                                            <div id="email-error-block" style="clear:both;" class="error-block"></div>
                                        </div>
                                    </div>
                                    <div class="RT-Dashboard-Form__col-tp-33 RT-Dashboard-Form__col-md-100">
                                        <div class="RT-Dashboard-Form__form-group-horizontal">
                                            <label class="RT-Dashboard-Form__label" for="userPhone">Phone</label>
                                            <input class="RT-Dashboard-Form__form-control" type="tel" id="userPhone" name="contact_phone">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <label for="anything-else" class="RT-Dashboard-Form__label RT-Dashboard-Form__label--large">
                                    Is there anything else we should know?
                                </label>
                                <textarea class="RT-Dashboard-Form__form-control" id="anything-else" name="additional_info"></textarea>
                            </fieldset>
                            <input type="submit" data-toggle-text="Sending..." class="RT-Dashboard-Form__button RT-Dashboard-Form__button--priority-submit  js--Alert-Submit-Button" value="Send Alert">
                        </div>
                    </div>
                </form>
            @endif
        </section>
        <!-- END OF: 'PriorityAlertForm' -->
    </div>
@else
    You don't have an active service plan with DESIGNLEDGE.  Please contact us to set up a plan
@endif





