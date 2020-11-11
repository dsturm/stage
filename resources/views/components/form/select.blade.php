@props([
  'name' => null
])
<div {{ $attributes->merge() }}>
  @if ($label)
  <label for="{{ $id }}" class="block text-sm font-medium leading-5 @if ($placeholder) sr-only @endif">{{ $label }}</label>
  @endif
  <select id="{{ $id }}"
    @if ($name) name="{{ $name }}" @endif
    class="block w-full py-2 pl-3 pr-10 mt-1 mb-0 text-base leading-6 border-gray-300 text-copy form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
    @if ($placeholder)
    <option value="">{{ $placeholder }}</option>
    @endif
    @foreach ($items as $value => $label)
    <option {{ $isSelected($value) ? 'selected="selected"' : '' }} value="{{ $value }}">
      {{ $label }}
    </option>
    @endforeach
  </select>
</div>
