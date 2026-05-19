<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{  Request::is('dashboard') ? 'active' : '' }}"arial-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{  Request::is('admin/users') ? 'active' : '' }}"href="{{ route('admin.users') }}">Users</a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{  Request::is('produk') ? 'active' : '' }}"arial-current="page" href="{{ route('produk.index') }}">Produk</a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{  Request::is('penjualan') ? 'active' : '' }}"arial-current="page" href="{{ route('penjualan.index') }}">Penjualan</a>
        </li>
      </ul>
      <!-- SEARCH (tetap seperti kamu, tidak diubah fungsi) -->
      <form class="d-flex position-absolute top-50 start-100 translate-middled">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </form>

      <!-- LOGOUT (FIX 419: tambah CSRF) -->
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-danger" type="submit">Logout</button>
      </form>

    </div>
  </div>
</nav>