<div class="top-navbar">

    <h4>
        <i class="bi bi-grid-1x2-fill me-2 text-success"></i>
        @php
            $segment = request()->segment(1);
            $title = $segment ? ucfirst($segment) : 'Dashboard';
        @endphp
        @yield('page-title', $title)
    </h4>

    <div class="user-badge">
        <i class="bi bi-person-circle"></i>
        <span>{{ Auth::user()->name }}</span>
    </div>

</div>