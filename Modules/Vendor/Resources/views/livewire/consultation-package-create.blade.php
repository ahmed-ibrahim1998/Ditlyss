<div class="container">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{route('consultation.store')}}">
                    @csrf
{{--                    <x-admin::input-select id="user_id" name="user_id" wire:model="name" label="User name: " :options="\App\Models\User::all()" optionsValueField="id" optionsDisplayField="name" data-allow-clear="true"></x-admin::input-select>--}}

                    <div class="form-group mb-5">
                        <label for="users">User Name: </label>
                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" name="user_id" wire:model="name">
                            @foreach(\App\Models\User::all() as $item)
                                <option value="{{$item->id}}" @if($consultation->user_id == $item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Your Gender " class="form-control input-md" wire:model="gender">
                            @error('gender') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Age</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="You Age" class="form-control input-md" wire:model="age">
                            @error('age') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Height</label>
                        <div class="col-md-4">
                            <input type="number" placeholder="Your Height" class="form-control input-md" wire:model="height">
                            @error('height') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Weight</label>
                        <div class="col-md-4">
                            <input type="number" placeholder="weight" class="form-control input-md" wire:model="weight">
                            @error('weight') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Physical Activity</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Your Physical Activity" class="form-control input-md" wire:model="physical_activity">
                            @error('physical_activity') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <div class="col-md-4" wire:ignore>
                            <textarea type="text" class="form-control form-control-solid" placeholder="Type Notes ..." name="additional_notes" wire:model="additional_notes"></textarea>
                            @error('additional_notes') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-success float-right" wire:click="addConsultation"><i class="fa fa-save"></i> Save</button>

                    {{--                    <x-admin::input-text id="gender" name="gender" wire:model="gender" value="male" label="Gender" model="user.gender" ></x-admin::input-text>--}}
{{--                    <x-admin::input-number id="age" name="age" wire:model="age" label="Age" model="user.age" ></x-admin::input-number>--}}
{{--                    <x-admin::input-number id="height" wire:model="height" name="height" label="Height" model="user.height"></x-admin::input-number>--}}
{{--                    <x-admin::input-text id="weight" wire:model="weight" name="weight" label="Weight" model="user.weight" ></x-admin::input-text>--}}
{{--                    <x-admin::input-text id="physical_activity" wire:model="physical_activity" name="physical_activity" label="Physical Activity" model="user.physical_activity"></x-admin::input-text>--}}

{{--                    <div class="form-group mb-5">--}}
{{--                        <label class="form-label">Notes</label>--}}
{{--                        <textarea class="form-control form-control-solid" name="additional_notes" wire:model="additional_notes"></textarea>--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i>Save</button>--}}
                </form>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        $(document).ready(function(){
            $("#user_id").click(function(){
                $("#physical_activity").hide();
            });
        });
    </script>
@endpush
