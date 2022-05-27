@extends('admin::layouts.master')

@section('content')
    <livewire:admin::datatables
        :model="\Modules\Rating\Entities\Rating::class"
        :with="['customer', 'order']"
        :include="[
                    'normal:id,ID',
                        'relation:user_id,customer,name,Customer',
                        'relation:order_id,order,id,Order',
                    ]"
        routeName='ratings'></livewire:admin::datatables>

@endsection
