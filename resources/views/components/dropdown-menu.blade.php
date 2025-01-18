 <li class="{{ $active ? 'active' : 'text-azure'}} nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
        <span class="nav-link-icon d-md-none d-lg-inline-block {{ $active ? 'text-azure' : ''}}" ><!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
        {{ $icon }}
      </span>
      <span class="nav-link-title {{ $active ? 'text-azure' : ''}}">
        {{ $slot }}
    </span>
    </a>
    <div class="dropdown-menu"  data-bs-theme="light">
        {{ $dropdowncontent }}
    </div>
</li>
