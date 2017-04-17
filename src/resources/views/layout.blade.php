@extends('layouts.base')

@section('styles')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset_revision('main.css') !!}">
@stop

@section('app')
    <div id="app" data-role="app" data-route="{{ Route::currentRouteName() }}">
        {{-- #header/sidebar --}}
        <div id="header" data-role="header" data-position="fixed" data-equalize="window">
            <div id="brand">
                <div style="height:43px;background-color:#8135ff">
                    <div style="height:43px;background-color:rgba(0,0,0,.95)"></div>
                </div>
                @include('layouts.partials.brand')
            </div>
            <div id="corner-tl">
                @include('layouts.partials.sidebars.1')
            </div>
            <div id="corner-bl">
                @include('layouts.partials.sidebars.2')
            </div>
        </div>

        {{-- #main view --}}
        <div class="{{ @$config['main.class'] }}" id="main" data-role="main" data-equalize="window">

            {{-- primary #navigation --}}
            @include('layouts.partials.nav')

            {{-- #content --}}
            <div id="content" class="inline-col" data-role="content">
                <div class="container">
                    {{--@include('flash::message')--}}
                    {!! $content !!}
                </div>
            </div>
            <!--
                -->
            <aside id="content-sidebar" class="inline-col hidden-sm hidden-xs" data-role="sidebar-1"
                   data-equalize="parent">
                @include('layouts.partials.sidebars.3')
            </aside>
            <footer id="content-footer">
                <div style="height:40px">
                    <div style="height:40px;background-color:#d9d9d9;line-height:3;padding: 0 15px">
                        <a href="http://jiko.us/1E9qYfi"><i class="fa fa-twitter"></i> Follow me for updates @joejiko
                        </a>
                    </div>
                </div>
            </footer>
        </div>

        <aside class="hidden-sm hidden-xs" id="sidebar" data-equalize="window">
            {{-- @include('layouts.partials.search') --}}
            <div id="corner-tr">
                {{-- @include('layouts.partials.sidebars.3') --}}
                @include('layouts.partials.sidebars.4')
            </div>
            <div id="corner-br">
                @include('layouts.partials.sidebars.5')
            </div>
        </aside>
        <div id="footer" data-role="footer" data-position="fixed"></div>
    </div>
@stop