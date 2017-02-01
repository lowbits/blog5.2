<!DOCTYPE html>
      <html>
          @include('partials._head') <!-- head ist in _head.blad.php ! -->
          <body>
            @include('partials._nav') <!--unsere navigation -->
            <div class="container">

              @include('partials._messages')

              {{ Auth::check() ? "Logged In" : "Logged Out"}}

              <!--@if(Auth::check())

              @endif -->

              @yield('content') <!--unser content -->
              @include('partials._footer') <!--unser footer -->
            </div> <!-- end of .container -->
            @include('partials._javascript') <!--unsere javascripts -->

            @yield('scripts')
          </body>
     </html>
