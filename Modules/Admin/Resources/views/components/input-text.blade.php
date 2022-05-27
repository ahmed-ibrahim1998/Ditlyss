@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false, 'oldValue'=>'', 'model'=>null])
<div class="mb-5">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <input type="text" id="{{$id}}" name="{{$name}}" class="form-control form-control-solid" placeholder="{{$placeholder}}" value="{{$oldValue}}" @if($model) wire:model="{{$model}}" @endif/>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
    @error($model)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
