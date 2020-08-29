
<!DOCTYPE html>
<html lang="en" class="app">
@include('includes.head')
<body>
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <section class="vbox">
@include('includes.header')

    <section>
      <section class="hbox stretch">
        <!-- .aside -->
               @include('includes.sidebarleft')
        <!-- /.aside -->
        <section id="content">
       {{--  @include('includes.alert') --}}
          <section class="vbox">          
           @yield('content')
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        @include('includes.footer')
      </section>
    </section>
  </section>
@include('includes.scripts')

</body>
</html>
