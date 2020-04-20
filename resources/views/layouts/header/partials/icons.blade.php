<ul class="icons menu">
  <!-- Search Icon -->
  <li class="menu-item @if(is_search()) active @endif">
    <a class="search-trigger prevent" href="{{ get_search_link() }}">
      <span class="align-text-bottom hover:text-primary">
        @svg('search', 'search--open opacity-100 absolute inset-0', ['aria-label' => 'search'])
        @svg('x', 'search--close opacity-0 absolute inset-0', ['aria-label' => 'close'])
      </span>
    </a>
  </li>

  <!-- Mini Cart Icon (If WC is active) -->
  @if($shop)
    <li class="menu-item hover-open has-children @if($is_cart)) active @endif">

      <a class="cart-contents prevent" href="{{ $cart_url }}" title="{!! __( 'View your shopping cart', 'stage' ) !!}">
        @svg('shopping-bag')
        <sup class="cart-count count text-primary">
          {{ $cart_contents_count }}
        </sup>
      </a>

      @if( ! is_cart() && ! is_checkout() )
        <div class="menu-cart-content sub-menu">
          @include('layouts.header.shop.mini-cart')
        </div>
      @endif
    </li>
  @endif

  <!-- Hamburger Mobile Icons -->
  <li class="menu-item">
    <button class="nav-trigger lg:hidden hamburger hamburger--elastic" type="button" aria-label="Menu" aria-controls="navigation">
      <span class="hamburger-box align-middle">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </li>
</ul>
