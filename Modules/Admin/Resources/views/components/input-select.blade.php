@props(['name', 'id'=>$name,'label', 'placeholder'=>'Please Enter '.$label, 'is_required'=>false,'mergeContainerStyle'=>'', 'options', 'optionsValueField', 'optionsDisplayField','oldValue'=>'', 'model'=>null, 'mergeContainerClass'=>''])

<div class="{{$mergeContainerClass}}" style="{{$mergeContainerStyle}}">
    <div class="mb-5" wire:ignore>
        <label for="{{$id}}" class="form-label">{{$label}}</label>
        <select class="form-select form-select-solid" data-control="select2" aria-label="Select example" id="{{$id}}" name="{{$name}}">
            <option value="">{{$placeholder}}</option>
            @foreach($options as $option)
                <option value="{{$option[$optionsValueField]}}" {{old($name) == $option[$optionsValueField]  ||  $option[$optionsValueField] == $oldValue ?  'selected' : ''}}>{{$option[$optionsDisplayField]}}</option>
            @endforeach
        </select>
    </div>
    @error($name)
    <span class="text-danger">{{$message}}</span>
    @enderror
    @error($model)
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
