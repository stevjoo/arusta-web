@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-white focus:ring-white rounded-md shadow-sm']) }}>
