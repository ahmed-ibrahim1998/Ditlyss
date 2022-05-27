@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false, 'oldValue'=>''])
<div class="form-check form-check-custom form-check-solid  form-check-lg">
    <input class="form-check-input" type="checkbox" value="{{old($name, $oldValue)}}" id="{{$id}}"/>
    <label class="form-check-label" for="{{$id}}">
        {{$label}}
    </label>
</div>

@push('javascript')
    <script>
        $('#{{$id}}').on('change', function () {
            this.value = this.checked ? 1 : 0;
        }).change();
    </script>
@endpush
