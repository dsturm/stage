<div class="text-white bg-ibb-blue-500">
  <div class="max-w-2xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8 lg:py-24">
    <div class="mb-4 text-2xl font-bold text-center md:text-left md:text-4xl">
      {{ $title ?? 'Find your new job now.' }}</div>
    <form class="grid items-end gap-4 md:grid-flow-col">
      @if ($locations)
      <x-form.select :placeholder="__('Location', 'stage')" :items="$locations" />
      @endif
      @if ($categories)
      <x-form.select :placeholder="__('Specialization', 'stage')" :items="$categories" />
      @endif
      <x-form.button>{{ __('Find jobs', 'stage') }}</x-form.button>
    </form>
  </div>
</div>
