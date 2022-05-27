<div class="post d-flex flex-column-fluid">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6 mb-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="align-items-center justify-content-center justify-content-md-start w-100px">
                        <div class="" id="kt_datatable_example_1_length">
                            <label>
                                <select wire:model="perPage" class="form-select form-select-sm form-select-solid">
                                    <option>5</option>
                                    <option>7</option>
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="fa fa-search position-absolute ms-6"></i>
                        <input id="myInput" wire:model.debounce.100ms="search" type="text" class="form-control form-control-solid w-250px ps-15" placeholder="Search Orders"/>
                    </div>
                    <!--end::Search-->
                    <div class="ml-3">
                        <a class="btn btn-primary" href="{{route($routeName.'.create')}}"><i class="fa fa-plus"></i>Add New</a>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 ">
                <div class="table-responsive mb-5">
                    <table class="table table-rounded table-striped border gy-6 gs-6" id="kt_customers_table">
                        <thead>
                        <!--begin::Table row-->
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                            @foreach($viewColumns as $index => $col)
                                <th wire:click="sortBy('{{$index}}')" class="hover:underline cursor-pointer uppercase">
                                    @if($sortField == $col)<i class="d-inline hover:rotate-180 mr-2 fa fa-angle-double-{{$sortField == $index && $sortDirection == 'asc' ? 'up' : 'down'}}"></i>@endif{{$col['display']}}
                                </th>
                            @endforeach
                            <th>
                                Actions
                            </th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                        @forelse($Collection as $item)
                            <tr wire:key="{{$item->id}}" wire:loading.class="opacity-50">
                                @foreach($viewColumns as $index => $col)
                                    @if($col['type']=='normal')
                                        <td>{{$item->$index}}</td>
                                    @else
                                        <td>{{$item[$col['relation']] ? $item[$col['relation']][$col['field']] :''}}</td>
                                    @endif
                                @endforeach
                                <td class="d-flex">
                                    <a class="btn btn-primary mr-2" href="{{route($routeName.'.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                    <form action="{{route($routeName.'.destroy', $item)}}" method="post" onsubmit="confirm('{{__('order::messages.sure-to-delete')}}')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20" class="text-center">
                                    No records found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{$Collection->links()}}
            </div>

            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
