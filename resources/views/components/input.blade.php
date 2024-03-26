@props(['label', 'name', 'type', 'value' => ''])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input value = "{{ $errors->any() ? old($name) : $value }}" name = "{{ $name }}" class="form-control"
        type = "{{ $type }}" id="{{ $name }}"></input>
</div>
@error($name)
    <p class = "text-danger">{{ $message }}</p>
@enderror
