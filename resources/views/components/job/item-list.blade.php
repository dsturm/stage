<div class="container px-4 py-4 mx-auto alignwide sm:px-6 sm:py-12 lg:px-8 lg:py-24 lg:pt-16">
  <div class="mb-4 text-4xl font-medium leading-tight text-ibb-blue-500">
    {{ $title ?? __('Current vacancies', 'stage') }}
  </div>
  <ul class="my-6 space-y-2 list-none">
    @foreach ($items as $item)
    <li>
      <x-job.item :item="$item" />
    </li>
    @endforeach
  </ul>
  <div class="more">
    <x-nav.link-more :to="get_post_type_archive_link($post_type)">
      {{ sprintf(__('Show more %s', 'stage'), _nx('Job', 'Jobs', 2, 'CPT label', 'stage')) }}
    </x-nav.link-more>
  </div>
</div>
