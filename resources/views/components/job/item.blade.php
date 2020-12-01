<div
  class="block transition duration-150 ease-in-out border-l-4 bg-ibb-blue-100 hover:bg-ibb-blue-150 focus:outline-none focus:bg-ibb-blue-150 text-ibb-blue-500 border-ibb-turquoise-500 hover:border-ibb-turquoise-600"
  x-data="{ open: false }">
  <div class="px-4 py-4 sm:px-6" x-on:click="open = !open" x-on:click.away="open = false">
    <div class="flex justify-between posts-center">
      <a href="{{ get_the_permalink($item['ID']) }}"
        class="text-base font-medium leading-5 truncate text-ibb-blue-600 sm:text-lg" x-on:click.prevent>
        {{ $item['title'] }}
      </a>
      <div class="flex flex-shrink-0 ml-2">
        @if ($item['post_date'])
        <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-white bg-ibb-turquoise-400">
          {{ $item['post_date']->format('d.m.Y') }}
        </span>
        @endif
      </div>
    </div>
    <div class="mt-2 sm:flex sm:justify-between">
      <div class="flex mt-2 text-sm leading-5 posts-center text-ibb-gray-500 sm:mt-0">
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
  <div class="border-t bg-ibb-blue-50 border-ibb-turquoise-300" x-show="open" x-cloak>
    <div class="px-4 py-4 sm:px-6">
      <x-job.details :job="$item['ID']" />
      <x-job.apply-button :job="$item['ID']">
        {{ __('Apply now', 'stage') }}
      </x-job.apply-button>
    </div>
  </div>
</div>
