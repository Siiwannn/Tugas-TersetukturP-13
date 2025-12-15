<!-- Header -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 20px;
        margin-top: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .logo {
        display: flex;
        align-items: center;
        margin-top: -5px;
    }
    .logo img {
        height: 40px;
    }
    .nav-right {
        display: flex;
        align-items: center;
        margin-top: -8px;
    }
    .nav-right a,
    .user-btn {
        font-weight: bold;
    }
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        margin-left: 10px;
    }
    .hamburger span {
        width: 25px;
        height: 3px;
        background: #333;
        margin: 3px 0;
        transition: 0.3s;
    }
    .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background: #fff;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        transition: left 0.3s;
        z-index: 1000;
        padding-top: 60px;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .sidebar ul li {
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
    }
    .sidebar-logo {
        text-align: left;
        padding: 20px;
        border-bottom: 1px solid #eee;
    }
    .sidebar-logo img {
        height: 50px;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        transition: background 0.3s;
    }
    .sidebar ul li a:hover {
        background: #f5f5f5;
        border-radius: 5px;
        margin: 0 10px;
    }
    .sidebar.active {
        left: 0;
    }
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        display: none;
        z-index: 999;
    }
    .overlay.active {
        display: block;
    }
    @media screen and (max-width: 768px) {
        .logo {
            display: none;
        }
        #nav-links {
            display: none;
        }
        .hamburger {
            display: flex;
        }
        .nav-left {
            flex: 1;
        }
    }
</style>
<!-- Header -->
<header>
 <nav class="navbar">

  <div class="nav-left">

    <a href="/" class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>

    <ul id="nav-links">
      <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
      <li><a href="/cars" class="{{ Request::is('cars') ? 'active' : '' }}">Mobil</a></li>

      @auth
        <li><a href="/admin/cars" class="{{ Request::is('admin/cars') ? 'active' : '' }}">CRUD Mobil</a></li>
      @endauth

      <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a></li>
      <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Hubungi Kami</a></li>
     </ul>

     <div class="hamburger" id="hamburger">
       <span></span>
       <span></span>
       <span></span>
     </div>

   </div>


  <div class="nav-right">

    @guest
      <a href="{{ route('login') }}" class="btn-login">Login</a>
    @endguest

    @auth
     <div class="user-box dropdown">

        <button class="user-btn" id="userToggle">
          <i class="bi bi-person-circle"></i>
          {{ Auth::user()->name }}
          <i class="bi bi-chevron-down"></i>
        </button>

        <div class="user-dropdown" id="userMenu">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn" type="submit">
              Logout
            </button>
          </form>
        </div>

      </div>
    @endauth

  </div>

 </nav>

 <div class="sidebar" id="sidebar">
   <div class="sidebar-logo">
     <a href="/">
       <img src="{{ asset('images/logo.png') }}" alt="Logo">
     </a>
   </div>
   <ul>
     <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Beranda</a></li>
     <li><a href="/cars" class="{{ Request::is('cars') ? 'active' : '' }}">Mobil</a></li>

     @auth
       <li><a href="/admin/cars" class="{{ Request::is('admin/cars') ? 'active' : '' }}">CRUD Mobil</a></li>
     @endauth

     <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">Tentang Kami</a></li>
     <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Hubungi Kami</a></li>
   </ul>
 </div>

 <div class="overlay" id="overlay"></div>
</header>


<!-- JS DROPDOWN -->
<script>
document.addEventListener("DOMContentLoaded", function(){

    const userToggle = document.getElementById("userToggle");
    const userMenu   = document.getElementById("userMenu");

    if(userToggle){
      userToggle.addEventListener("click", function(e){
        e.stopPropagation();
        userMenu.classList.toggle("show");
      });
    }

    document.addEventListener("click", ()=>{
      if(userMenu){
        userMenu.classList.remove("show");
      }
    });

    // Hamburger menu
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    if(hamburger){
      hamburger.addEventListener("click", function(){
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
      });
    }

    if(overlay){
      overlay.addEventListener("click", function(){
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
      });
    }

});
</script>