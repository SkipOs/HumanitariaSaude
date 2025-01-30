<div class="card card-sm" style="box-shadow: 3px 3px 3px #0000008b">
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
                <div class="text-primary">
                    Total atual:
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
