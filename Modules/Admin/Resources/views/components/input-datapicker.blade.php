@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false,'oldValue'=>'', 'model'=>null])

<div class="mb-5">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <input name="{{$name}}" class="form-control form-control-solid has-danger" placeholder="Pick date" id="{{$id}}" value="{{old($name, $oldValue)}}" @if($model) wire:model="{{$model}}" @endif/>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
    @error($model)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

@push('javascript')
    <script>
        $("#{{$id}}").daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                autoApply: true,
                locale: {
                    format: "YYYY-M-DD HH:mm"
                }
            }
        );
    </script>
@endpush
