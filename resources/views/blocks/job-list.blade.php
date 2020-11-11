<div class="{{ $block->classes }}">
  @if ($showFinder)
  <x-job.finder />
  @endif
  @if (! $block->preview)
  <x-job.item-list :limit="$limit" />
  @else
  <p>...</p>
  @endif
</div>
