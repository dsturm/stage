<footer class="w-screen py-8 text-white bg-ibb-blue-500">
  <div class="container footer-inner {{ $desktop['align'] }}">
    @if( $has_widgets )
      <div class="my-12 widgets-wrap">
        <div class="items-stretch justify-between flex-grow -mx-4 sm:flex">
          @php dynamic_sidebar( 'sidebar-footer' ) @endphp
        </div>
      </div>
    @endif

    <div class="flex flex-wrap items-center justify-between text-sm text-opacity-50 menu-wrap">
      @include('layouts.footer.copyright')
      @include('layouts.footer.navigation')
    </div>
  </div>
</footer>
