@extends('layouts.admin')

@section('content')
<div class="row tile_count">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count">{{ $counts['users'] }}</div>
            <h3>Total Usuarios</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count">{{ $counts['afi'] }}</div>
            <h3>Total Afiliados</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-archive"></i></div>
            <div class="count ">{{ $counts['api'] }}</div>
            <h3>Total Apiarios</h3>
        </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file-text"></i></div>
            <div class="count">{{ $counts['recep'] }}</div>
            <h3>Total Recepción</h3>
        </div>
        </div>
       
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Demo</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                    <hr />

<h1>{{ $chart2->options['chart_title'] }}</h1>
{!! $chart2->renderHtml() !!}

<hr />
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
{!! $chart2->renderJs() !!}
@endsection