 @props(['tabler' => 'mb-3'])

 <label>{{ $slot }}</label>
 <div class={{ $tabler }}>
    <input {{ $attributes }} />
 </div>
