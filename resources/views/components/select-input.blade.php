@props(['disabled' => false, 'options' => [], 'placeholder' => 'Seleccione una opción'])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#1A1D2E] dark:focus:border-indigo-600 focus:ring-[#1A1D2E] dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    @if($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif
    @foreach ($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
