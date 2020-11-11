<div class="{{ $block->classes }}">
  @if ($showFinder)
  <x-event.finder />
  @endif
  @if (! $block->preview)
  <x-event.item-list :limit="$limit" />
  @else
  <p>...</p>
  @endif
</div>
