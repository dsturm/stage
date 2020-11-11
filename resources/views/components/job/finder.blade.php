<div class="text-white bg-ibb-blue-500">
  <div class="container px-4 py-8 mx-auto alignwide sm:px-6 sm:py-12 lg:px-8 lg:py-24">
    <div class="mb-4 text-2xl font-bold leading-tight text-center md:text-left md:text-4xl">
      {{ $title ?? 'Find your new job now.' }}</div>
    <form action="{{ home_url('/') }}" class="grid items-end gap-4 md:grid-flow-col" role="search" method="post">
      <input type="hidden" name="post_type" value="job" />
      @if ($categories)
      <x-form.select name="s" :placeholder="__('Specialization', 'stage')" :items="$categories" />
      @endif
      @if ($locations)
      <x-form.select :placeholder="__('Location', 'stage')" :items="$locations" />
      @endif
      <x-form.button>{{ __('Find jobs', 'stage') }}</x-form.button>
    </form>
  </div>
</div>
