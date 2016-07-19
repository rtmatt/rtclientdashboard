<div class="modal fade js--Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Detailed Monthly Benefits</h4>
            </div>
            <div class="modal-body clearfix">


            @foreach($dashboard_data->benefits as $benefit)
                <div class="modal-item clearfix">
                    <div class="services-icon">
                        <img src="{{$benefit->icon}}" alt="{{$benefit->name}} Icon">
                    </div>
                    <div class="services-content">
                        <div class="services-content-title">{{$benefit->name}}</div>
                        <p class="services-content-body">
                            {{$benefit->description}}
                        </p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>