@props(['active' => false])

<li class="{{ $active ? 'active' : ''}} nav-item">
    <a class="nav-link" {{ $attributes }} >
      <span class="nav-link-icon d-md-none d-lg-inline-block {{ $active ? 'text-azure' : ''}}" ><!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
        {{ $icon }}
      </span>
      <span class="nav-link-title {{ $active ? 'text-azure' : ''}}">
        {{ $slot }}
    </span>
    </a>
</li>