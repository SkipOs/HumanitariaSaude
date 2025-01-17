 
@props(['tabler' => 'col-md'])
 
<div class={{$tabler}}>
    <label>{{$slot}}</label>
    <div>
        <input {{ $attributes }} />
    </div>
</div>