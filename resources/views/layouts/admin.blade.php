@extends('layouts.app1')

@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('sections.navigation')
                @include('sections.header')
            @show

            @yield('left-sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('title')</h1>
                    </div>
                    @if(Breadcrumbs::exists())
                        <div class="title_right">
                            <div class="pull-right">
                                {!! Breadcrumbs::render() !!}
                            </div>
                        </div>
                    @endif
                </div>
                @yield('content')
            </div>

            <footer>
                @include('sections.footer')
            </footer>
        </div>
    </div>
@stop

@section('styles')
    {{ Html::style('assets/admin/css/admin.css') }}
@endsection

@section('scripts')
    {{ Html::script('assets/admin/js/admin.js') }}
@endsection