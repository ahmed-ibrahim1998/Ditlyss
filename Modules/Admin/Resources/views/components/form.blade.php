@props(['route','method'])

<div>
    <form action="{{$route}}" method="POST">
        @csrf
        @method($method)
        {{$slot}}

        <div class="mt-2">
            <button class="btn btn-success float-end" type="submit">Save</button>
        </div>
    </form>
</div>
