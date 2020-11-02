<?php
/**
 * Bootstrap alerts
 * User: Code Donkey
 * Date: 013 13 Oct, 2016
 * Time: 11:42 PM
 */
?>
@if(Session::has('theme-primary'))
    <div class="alert alert-primary mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-bell"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-primary') !!}
    </div>
@endif
@if(Session::has('theme-secondary'))
    <div class="alert alert-primary mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-volume"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-secondary') !!}
    </div>
@endif

@if(Session::has('theme-success'))
    <div class="alert alert-success mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-check-circle"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-success') !!}
    </div>
@endif

@if(Session::has('theme-info'))
    <div class="alert alert-info mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-info-circle"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-info') !!}
    </div>
@endif

@if(Session::has('theme-warning'))
    <div class="alert alert-warning mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-exclamation-triangle"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-warning') !!}
    </div>
@endif

@if(Session::has('theme-danger'))
    <div class="alert alert-danger mb-2" role="alert">
        <span class="alert-icon"><i class="uil uil-times-circle"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! Session('theme-danger') !!}
    </div>
@endif
