@props(['to' => '#'])
<a
  {{ $attributes->merge(['class' => 'hover:underline transition-colors duration-300 ease-in-out text-ibb-blue-500 hover:text-ibb-blue-600 focus:text-ibb-blue-600', 'href' => $to, 'target' => null, 'rel' => null]) }}>
  {{ $slot }}
</a>
