<div class="container px-4 py-4 mx-auto alignwide sm:px-6 sm:py-12 lg:px-8 lg:py-24 lg:pt-16">
  <div class="mb-4 text-4xl font-medium leading-tight text-heading text-ibb-blue-500">{{ $title ?? __('Current events', 'stage') }}</div>
  <ul class="my-6 space-y-2 list-none">
    @foreach ($items as $item)
    <li>
      <a href="#"
        class="block transition duration-150 ease-in-out border-l-4 bg-ibb-blue-100 hover:bg-ibb-blue-150 focus:outline-none focus:bg-ibb-blue-150 text-ibb-blue-500 border-ibb-turquoise-500 hover:border-ibb-turquoise-600">
        <div class="px-4 py-4 sm:px-6">
          <div class="flex items-center justify-between">
            <div class="text-base font-medium leading-5 truncate text-ibb-blue-600 sm:text-lg">
              <time class="text-ibb-turquoise-500">{{ $item['event_start']->format('d.m.Y') }}</time>
              {{ $item['title'] }}
            </div>
            <div class="flex flex-shrink-0 ml-2">

            </div>
          </div>
          <div class="mt-2 sm:flex sm:justify-between">
            <div class="flex items-center mt-2 text-sm leading-5 text-ibb-gray-500 sm:mt-0">
              <!-- Heroicon name: location-marker -->
              <svg class="flex-shrink-0 w-5 h-5 mr-2 fill-current text-ibb-gray-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" width="20" height="20">
                <path fill-rule="evenodd"
                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                  clip-rule="evenodd" />
              </svg>
              {{ $item['city'] }} ({{ $item['state'] }})
            </div>
          </div>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
  <div class="more">
    <x-nav.link-more :to="get_post_type_archive_link($post_type)">
      {{ sprintf(__('Show more %s', 'stage'), _nx('Event', 'Events', 2, 'CPT label', 'stage')) }}
    </x-nav.link-more>
  </div>
</div>
