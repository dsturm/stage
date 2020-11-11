@if( has_custom_logo() )
  {!! $logo !!}
@else
  <span class="text-lg leading-none lg:text-xl z-1">
    <a class="site_brand--name" href="{!! $home_url !!}" title="{!! $site_name !!}">
      @if (\Roots\asset('images/logo.svg')) @svg('images/logo.svg', 'w-40')
      @else {!! $site_name !!} @endif
    </a>
    @if( $show_tagline )
      <span class="block mt-1 text-sm site_brand--tagline text-copy">{!! $site_tagline !!}</span>
    @endif
  </span>
@endif
