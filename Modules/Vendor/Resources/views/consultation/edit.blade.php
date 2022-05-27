@extends('admin::layouts.master')
@section('content')

<div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('consultation.update', $consultation)}}" >
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-5">
                        <label for="users">User Name: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="user_id">
                            @foreach(\App\Models\User::all() as $item)
                                <option value="{{$item->id}}" @if($consultation->user_id == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Gender</label>
                        <input type="text" name="gender" class="form-control form-control-solid" value="{{old('gender', $consultation->gender)}}"/>
                        @error("gender")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Age</label>
                        <input type="number" name="age" class="form-control form-control-solid" value="{{old('age', $consultation->age)}}"/>
                        @error("age")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="">Height</label>
                        <input type="number" name="height" class="form-control form-control-solid" value="{{old('height', $consultation->height)}}"/>
                        @error("height")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label for="">Weight</label>
                        <input type="number" name="weight" class="form-control form-control-solid" value="{{old('weight', $consultation->weight)}}"/>
                        @error("weight")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group mb-5">
                        <label for="">Physical Activity</label>
                        <input type="text" name="physical_activity" class="form-control form-control-solid" value="{{old('physical_activity', $consultation->physical_activity)}}"/>
                        @error("physical_activity")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label">Notes</label>
                        <textarea type="text" name="additional_notes" class="form-control form-control-solid">{{old('additional_notes', $consultation->additional_notes)}}</textarea>
                        @error("additional_notes")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i>Save</button>
                </form>
            </div>
        </div>
    </div>



@endsection
