@extends('admin::layouts.master')
@section('content')

    <div class="container" xmlns:x-admin="http://www.w3.org/1999/html">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('consultation.store')}}">
                    @csrf

                    <x-admin::input-select id="user_id" name="user_id" label="User name: "
                                           :options="\App\Models\User::all()" optionsValueField="id"
                                           optionsDisplayField="name" data-allow-clear="true"></x-admin::input-select>

                    <x-admin::input-text id="gender" name="gender" value="male" label="Gender"
                                         model="user.gender"></x-admin::input-text>
                    <x-admin::input-number id="age" name="age" label="Age" model="user.age"></x-admin::input-number>
                    <x-admin::input-number id="height" name="height" label="Height"
                                           model="user.height"></x-admin::input-number>
                    <x-admin::input-text id="weight" name="weight" label="Weight"
                                         model="user.weight"></x-admin::input-text>
                    <x-admin::input-text id="physical_activity" name="physical_activity" label="Physical Activity"
                                         model="user.physical_activity"></x-admin::input-text>

                    <div class="form-group mb-5">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control form-control-solid" name="additional_notes"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i>Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('javascript')
    <script>
        $('#user_id').on('change', function (event) {
            window.axios.get('').then(res => console.log(res));
        })
    </script>



@endpush
