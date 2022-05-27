@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false, 'oldValue'=>'', 'model'=>null, 'classes'=>''])
<div class="mb-5 {{$classes}}">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <input type="number" step="any" id="{{$id}}" name="{{$name}}" class="form-control form-control-solid" placeholder="{{$placeholder}}" value="{{old($name, $oldValue)}}" @if($model) wire:model="{{$model}}" @endif/>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
    @error($model)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
