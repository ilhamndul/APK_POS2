<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Point of Sale</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('jenis*') ? 'active' : '' }}" href="{{ route('jenis.index') }}">Jenis</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}" aria-current="page" href="{{ route('produk.index') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}" aria-current="page" href="{{ route('penjualan.index') }}">Penjualan</a>
        </li>
      </ul>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-danger" type="submit">Logout</button>
      </form>

    </div>
  </div>
</nav>