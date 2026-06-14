<div class="sidebar p-3">

    <h3 class="text-white fw-bold mb-4">
        <i class="bi bi-capsule-pill"></i>
        NindyaFarma
    </h3>

    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i>
        Dashboard
    </a>

    <a href="/kategori" class="{{ request()->is('kategori*') ? 'active' : '' }}">
        <i class="bi bi-tags"></i>
        Kategori
    </a>

    <a href="/supplier" class="{{ request()->is('supplier*') ? 'active' : '' }}">
        <i class="bi bi-truck"></i>
        Supplier
    </a>

    <a href="/obat" class="{{ request()->is('obat*') ? 'active' : '' }}">
        <i class="bi bi-capsule"></i>
        Obat
    </a>

    <a href="/pelanggan" class="{{ request()->is('pelanggan*') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        Pelanggan
    </a>

    <a href="/transaksi" class="{{ request()->is('transaksi*') ? 'active' : '' }}">
        <i class="bi bi-receipt"></i>
        Transaksi
    </a>

    <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" class="mt-auto btn btn-danger text-white text-start py-2 px-3 rounded shadow-sm">
        <i class="bi bi-box-arrow-right"></i>
        Logout
    </a>

</div>