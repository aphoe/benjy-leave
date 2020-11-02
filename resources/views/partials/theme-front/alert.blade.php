<?php
/**
 * Bootstrap alerts
 * User: Code Donkey
 * Date: 013 13 Oct, 2016
 * Time: 11:42 PM
 */
?>
@if(Session::has('theme-notice'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert notice">
                <div class="alert_body">
                    <i class="icon-volume-2"></i>
                    {!! Session('theme-notice') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('theme-info'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert info">
                <div class="alert_body">
                    <i class="icon-info"></i>
                    {!! Session('theme-info') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('theme-danger'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert error">
                <div class="alert_body">
                    <i class="icon-close"></i>
                    {!! Session('theme-danger') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('theme-warning'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert warning">
                <div class="alert_body">
                    <i class="icon-info"></i>
                    {!! Session('theme-warning') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('theme-success'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert success">
                <div class="alert_body">
                    <i class="icon-check"></i>
                    {!! Session('theme-success') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('theme-message'))
    <div class="container my-3">
        <div class="col-12">
            <div class="alert success">
                <div class="alert_body">
                    <i class="icon-check"></i>
                    {!! Session('theme-message') !!}
                </div>
                <div class="alert_close"><i class="icon_close"></i></div>
            </div>
        </div>
    </div>
@endif
