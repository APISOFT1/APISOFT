<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">



<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
           

          

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>


{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>