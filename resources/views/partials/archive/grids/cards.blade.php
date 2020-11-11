<div class="wrap-inner {{ $align }}">
  <div class="flex flex-wrap items-stretch flex-1 grid-cards infinity-wrap md:-mx-2">
    @while( have_posts() ) @php the_post() @endphp
      @includeFirst( ['partials.archive.item-' . get_post_type(), 'partials.archive.item'] )
    @endwhile
  </div>
</div>
