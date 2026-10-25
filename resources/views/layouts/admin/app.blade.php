<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets-admin') }}/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title', 'Admin') | VandRent Admin</title>

    <meta name="description" content="" />

    {{-- start css --}}
    @include('layouts.admin.css')
    {{-- end css --}}

    <!-- Helpers -->
    <script src="{{ asset('assets-admin/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets-admin/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        {{-- start sidebar --}}
        @include('layouts.admin.sidebar')
        {{-- end sidebar --}}

        <!-- Layout container -->
        <div class="layout-page">

          {{-- start header --}}
          @include('layouts.admin.header')
          {{-- end header --}}

          <!-- Content wrapper -->
          <div class="content-wrapper">

            {{-- start main content --}}
            <div class="container-xxl flex-grow-1 container-p-y">
              @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              @yield('content')
            </div>
            {{-- end main content --}}

            {{-- start footer --}}
            @include('layouts.admin.footer')
            {{-- end footer --}}

            <div class="content-backdrop fade"></div>
          </div>
          <!-- / Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    {{-- start js --}}
    @include('layouts.admin.js')
    {{-- end js --}}
  </body>
</html>
