@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false, 'oldValue'=>''])

<div class="form-check form-switch form-check-custom form-check-solid  me-10 mb-5">
    <input class="form-check-input h-30px w-50px " type="checkbox" {{old($name) || $oldValue==='1' ? 'checked':''}} name="{{$name}}" value="{{old($name, $oldValue)}}" id="{{$id}}"/>
    <label class="form-check-label" for="{{$id}}">
        {{$label}}
    </label>
</div>

@push('css')
    <style>
        [type='checkbox']:checked, [type='radio']:checked {
            background-size: auto;
        }
    </style>
@endpush
@push('javascript')
    <script>
        $('#{{$id}}').on('change', function () {
            this.value = this.checked ? 1 : 0;
        }).change();
    </script>
@endpush
