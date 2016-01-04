@extends('logviewer.default')

@section('top')
<div class="page-header">
<h1>LogViewer for Laravel/Lumen</h1>
</div>
@stop

@section('content')
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills">
                <li class="{{ $current === null || $current === 'all' ? 'active' : ''}}"><a href="{{ Request::root() }}/{{ $url.'/'.$date.'/show' }}">All</a></li>
                @foreach ($levels as $level)
                    <li class="{{ $current === $level ? 'active' : '' }}"><a href='#' onclick='getData(this, "{{$level}}");'>{{ ucfirst($level) }}</a></li>
                @endforeach
                <li class="pull-right">
                    <button data-toggle="modal" data-target="#delete_modal" id="btn-delete" type="button" class="btn btn-danger">Delete current log</button>
                </li>
            </ul>
        </div>
    </div>
    <br>
    <div class="row">
    
        <div class="col-lg-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-primary">
                    <div id="collapse-log-list" class="panel-collapse panel-primary collapse">
                        <div class="panel-heading">
                                <h5>Available Logs:</h5>
                            </div>
                        <div class="panel-body">
                            <ul class="nav nav-list">
                                @foreach ($logs as $file)
                                     <li class="list-group-item">
                                        <a href="{{ Request::root() }}/{{ $url.'/'.$file.'/show' }} ">{{ $file }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12" id="data">
                    <p class="lead"><i class="fa fa-refresh fa-spin fa-lg"></i> Loading...</p>
                </div>
            </div>
        </div>
    
    </div>
</div>
<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>You are about to delete this log! This process cannot be undone.</p>
                <p>Are you sure you wish to continue?</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{{ '/logviewer/lumen/delete' }}">Yes</a>
                <button class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/logviewer/styles/logviewer.css') }}">
@endsection

@section('js')
<script>
var laravelLogViewerURL = '{{ $data_url }}';

function getData(obj, level){
    var _self = $(obj);
    $.ajax({
        type : "get",
        url : "/logviewer/lumen/" + level,
        dataType : "html",
        data: {
            key: $("#key").val(),
        },
        success : function(data, status, xhr){
            console.log(data);
            $('.nav-pills li').removeClass('active');
            _self.closest('li').addClass('active');
            var area = $('#data');
            area.fadeOut(200, function() {
                area.html(data);
                area.fadeIn(200);
            });
            // alert(json.result);
        },
    });
}
</script>
<script type="text/javascript" src="{{ url('assets/logviewer/scripts/logviewer.js') }}"></script>
@endsection
