@props(['type' => 'submit'])
<span {{ $attributes->merge(['class' => 'inline-flex mt-3 rounded-md shadow-sm sm:mt-0']) }}>
  <button type="{{ $type }}"
    class="inline-flex items-center justify-center w-full px-4 py-2 font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-sm bg-ibb-turquoise-600 hover:bg-ibb-turquoise-500 focus:outline-none focus:border-ibb-turquoise-700 focus:shadow-outline-ibb-turquoise active:bg-ibb-turquoise-700 sm:text-sm sm:leading-5">
    {{ $label ?? $slot ?? __('Submit', 'stage') }}
  </button>
</span>
