<div class="container alignwide">
  <ul class="my-6 space-y-2 list-none">
    @while( have_posts() ) @php the_post() @endphp
    <li>{{ $GLOBALS['post']->post_title }}</li>
    @endwhile
  </ul>

  {!! get_the_posts_navigation() !!}
</div>
