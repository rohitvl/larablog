@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Welcome @if(!Auth::guest()){{Auth::user()->name}}@endif</b></div>

                <div class="panel-body text-center">
                    Blogvel Landing Page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
