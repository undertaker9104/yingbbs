@extends('layouts.app')
@section('title', '無權限訪問')

@section('content')

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-body">
            @if (Auth::check())
                <div class="alert alert-danger text-center">
                    當前登錄帳號無後台訪問權限。
                </div>
            @else
                <div class="alert alert-danger text-center">
                    請登錄以後再做操作
                </div>

                <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                    登錄
                </a>
            @endif
        </div>
    </div>
</div>

@stop