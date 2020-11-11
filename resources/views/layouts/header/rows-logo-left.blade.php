<header class="sticky top-0 z-10 banner" x-data="{ open: false }">
  <div class="bg-white">
    <div class="container px-4 py-4 mx-auto alignwide sm:px-6 lg:px-8">
      <div class="flex items-center">
        <div class="flex items-center mr-2 -ml-2 md:hidden">
          <button @click="open = !open"
            class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-ibb-blue-400 hover:text-ibb-blue-500 hover:bg-ibb-blue-100 focus:outline-none focus:bg-gray-700 focus:text-white">
            <svg :class="{'hidden': open, 'block': !open }" class="w-6 h-6" stroke="currentColor" fill="none"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg :class="{'hidden': !open, 'block': open }" class="w-6 h-6" stroke="currentColor" fill="none"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <a class="flex items-center flex-shrink-0 brand" href="{{ home_url('/') }}">
          @svg('images.logo', 'w-24 md:w-40 h-16 md:h-24', ['aria-label' => $siteName])
        </a>
        <div
          class="flex ml-auto font-medium leading-6 text-white uppercase item-stretch bg-ibb-blue-500 lg:text-lg lg:leading-7">
          <span class="block px-2 py-1 bg-ibb-turquoise-500">IBB</span> <span
            class="block px-2 py-1">Karriereportal</span>
        </div>
      </div>
    </div>
  </div>

  <nav class="text-white nav-primary bg-ibb-turquoise-500">
    <div class="container px-4 mx-auto alignwide sm:px-6 lg:px-8">
      @if ($navigation)
      <div class="hidden font-medium uppercase md:flex tracking-2">
        @foreach ($navigation as $i => $item)
        <a href="{{ $item->url }}"
          class="px-3 py-3 text-sm text-white hover:text-white bg-ibb-turquoise-500 hover:bg-ibb-turquoise-600 leading-5 transition duration-150 ease-in-out {{ $item->classes ?? '' }} {{ $item->active ? 'bg-ibb-turquoise-600 active' : '' }}"
          {{ $item->target ? ' target="' . $item->target . '" rel="noopener"' : '' }}>{{ $item->label }}</a>
        @endforeach
      </div>
      @endif
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
      <div class="px-2 pt-2 pb-3 sm:px-3">
        @if ($navigation)
        @foreach ($navigation as $i => $item)
        <a href="{{ $item->url }}"
          class="block px-3 py-2 text-base font-medium text-white transition duration-150 ease-in-out {{ $item->active ? 'bg-ibb-turquoise-600' : 'bg-ibb-turquoise-500' }} rounded-md focus:outline-none focus:text-white focus:bg-ibb-turquoise-600 {{ $item->classes ?? '' }} {{ $i > 0 ? 'mt-1' : '' }}"
          {{ $item->target ? ' target="' . $item->target . '" rel="noopener"' : '' }}>{{ $item->label }}</a>
        @endforeach
        @endif
      </div>
    </div>
  </nav>
</header>
