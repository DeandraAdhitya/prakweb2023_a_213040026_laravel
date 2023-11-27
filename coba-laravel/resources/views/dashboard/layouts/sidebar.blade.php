<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'text-primary' : 'text-dark' }}" href="/dashboard">
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'text-primary' : 'text-dark' }}" href="/dashboard/posts">
            <i class="bi bi-file-earmark-text text-reset"></i>
            My Posts
          </a>
        </li>

        </ul>

      @can('admin')
        {{-- Judul --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>ADMINISTRATOR</span>
        </h6>

        <ul class="nav flex-column">
          {{-- Post categories --}}
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'text-primary' : 'text-dark' }}" href="/dashboard/categories">
              {{-- Icon post categories --}}
              <i class="bi bi-grid text-reset"></i>
              Post Categories
            </a>
          </li>
        </ul>
      @endcan

      <ul class="nav flex-column">
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button class="text-dark nav-link d-flex align-items-center gap-2 bg-grey border-0" style="cursor: pointer;">

              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>