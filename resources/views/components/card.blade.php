@props(['counter' => true])

<div class="card card-sm card-link card-link-pop" {{$attributes}} style="box-shadow: 3px 3px 3px #00000055">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="{{ $bgColor ?? 'bg-primary' }} text-white avatar">
                    {{ $icon }}
                    </svg>
                </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                    {{ $title }}
                </div>

                <div class="text-secondary">
                    {{ $subtitle }}
                </div>

                @if ($counter)
                    <div class="text-primary">
                        Total atual:
                        {{ $slot }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
