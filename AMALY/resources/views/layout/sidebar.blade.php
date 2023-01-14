<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-handshake"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Amaly</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      @if (auth()->user()->profil=="Administrateur")
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Utilisateurs</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Type d'utilisateur:</h6>
            <a class="collapse-item" href="{{ route('users.index') }}">Web</a>
            <a class="collapse-item" href="{{ route('userphones.index') }}">Mobile</a>
          </div>
        </div>
      </li>
      @endif
      <!-- Nav Item - Pages Collapse Menu -->
      @if (auth()->user()->profil=="Administrateur")
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('cas.index') }}" >
        <i class="fa fa-heart"></i>
          <span>Cas</span>
        </a>
      </li>
      <!-- ONG -->
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('Mescas.index') }}" >
        <i class="fa fa-heart"></i>
          <span>Cas</span>
        </a>
      </li>
      @endif

      <!-- Nav Item - Pages Collapse Menu -->
      @if (auth()->user()->profil=="Administrateur")
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('retour_cas.index') }}" >
        <i class="fa fa-bell"></i>
          <span>Retour Cas</span>
        </a>
      </li>
      <!-- ONG -->
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('indexONG') }}" >
        <i class="fa fa-bell"></i>
          <span>Retour Cas</span>
        </a>
      </li>
      @endif

      <!-- Nav Item - Pages Collapse Menu -->
      @if (auth()->user()->profil=="Administrateur")
      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('categories.index') }}">
            <i class="fa fa-tag"></i>
            <span>Catégories</span>
          </a>
        </li>
        @endif


      <!-- Nav Item - Pages Collapse Menu           ******* data-target="#collapsePages"  ********     -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dons.index') }}" >
          <i class="fas fa-handshake"></i>
          <span>Dons</span>
        </a>
      </li>
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
    