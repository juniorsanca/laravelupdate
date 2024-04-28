@props(['active' => false])
@props(['type' => false])

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false'}}" type="{{ $type ? 'a' : 'button'}}"
    {{ $attributes }}
    >{{ $slot }}</a>
