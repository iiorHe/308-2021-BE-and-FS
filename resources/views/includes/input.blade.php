<label for="{{ $fieldId }}">{{ $labelText }}</label>
<input type="text" value="{{ old($fieldId) }}" class="form-control {{ $errors->has($fieldId) ? 'is-invalid':'' }}" name="{{ $fieldId }}" id="{{ $fieldId }}" placeholder="{{ $placeHolderText }}">
@include('includes/validationErr', ['errFieldName' => $fieldId])
