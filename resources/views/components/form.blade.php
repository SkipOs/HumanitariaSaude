<form {{$attributes}}>
    @csrf

    <div class="card-header justify-content-center">
        <h3 class="card-title">{{$title}}</h3>
    </div>

    <div class="card-body">
        {{$slot}}
    </div>

    <div class="card-footer text-end bg-transparent">
        {{$actions}}
    </div>
</form>

<div class="text-center text-secondary mt-3">
    {{$bottomtext}}
</div>
