@if ($navigation)
  <ul class="menu text-inherit border-inherit w-auto">
    @foreach ($navigation as $item)
      <li class="menu-item click-open text-inherit border-inherit {{ $item->classes }}  {{ 'depth-' . $loop->depth }} {{ $item->children ? 'has-children' : '' }} {{ $item->active ? 'active' : '' }}">
        <a class="relative" href="{{ $item->url }}" title="{{ $item->label }}">
          {{ $item->label }}

          @if($item->children)
            @svg('chevron-down', 'w-4 h-auto inline-block')
          @endif
        </a>
        @include('layouts.header.navigation.menu-item')
      </li>
    @endforeach
  </ul>
@endif
