<ul class="h-full icons menu bg-inherit text-inherit border-inherit">
  {{-- WooCommerce Cart Icon --}}
  @if($shop)
    <li class="menu-item menu-icon text-inherit border-inherit hover-open has-children {{ $is_cart ? 'active hide-submenu' : '' }}">
      <a class="relative self-center w-6 h-6 mx-2 overflow-visible cart-trigger prevent" href="{{ $cart_url }}" title="{!! __( 'View your shopping cart', 'stage' ) !!}">
        @svg('shopping-cart', 'search--open opacity-100 absolute inset-0')
        <div class="absolute text-xs bottom-2/3 left-3/4 text-primary">
          {{-- WC replaces element with counter --}}
          <span class="cart-count">
            {{ $cart_contents_count }}
          </span>
        </div>
      </a>

      <div class="menu-cart-content sub-menu bg-body text-inherit border-inherit">
        @include('layouts.header.partials.mini-cart')
      </div>
    </li>
  @endif

  {{-- Search Icon --}}
  <li class="menu-item menu-icon bg-inherit text-inherit border-inherit {{ is_search() ? 'active' : '' }}">
    <a class="relative self-center w-6 h-6 mx-2 cursor-pointer search-trigger prevent" href="{{ get_search_link() }}">
      @svg('search', 'search--open opacity-100 absolute inset-0')
      @svg('x', 'search--close opacity-0 absolute inset-0')
    </a>
  </li>

  {{-- Mobile Off-Canvas-Menu--}}
  <li class="menu-item menu-icon bg-inherit text-inherit border-inherit">
    <button class="relative self-center w-6 h-6 ml-2 nav-trigger lg:hidden" type="button" aria-label="Menu" aria-controls="navigation">
      @svg('menu', 'nav--open opacity-100 absolute inset-0')
      @svg('x', 'nav--close opacity-0 absolute inset-0')
    </button>
  </li>
</ul>
