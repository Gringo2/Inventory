<html>
    <head>
    <title>
            @yield('title','Blog')
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="pagestyle" href="{{ URL::asset('css/sidebar.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ URL::asset('css/form.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">


    
    <!-- 
    - dashboard home
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;900&display=swap"
    rel="stylesheet">
  <link id="pagestyle" href="{{ URL::asset('css/style.css') }}" rel="stylesheet" />

  <!-- 
    - dashboard home
  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />


    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'/>

    <!--
        - #HEADER
      -->
<body>
<div class="sidebar close">
    <div class="logo-details">
    <i class='bx bx-menu' ></i>
      <span class="logo_name">Workplace</span>
      
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route('home')}}">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <!-- <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul> -->
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Products</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Products</a></li>
          <li><a href="{{route('products.create')}}">Add Product</a></li>
          <li><a href="{{route('products.list')}}">List Product</a></li>
          <li><a href="">Edit Product</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li><a href="{{route('categories.create')}}">Add Category</a></li>
          <li><a href="{{route('categories.list')}}">List Category</a></li>
          <li><a href="#">Edit Category</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-compass' ></i>
            <span class="link_name">Suppliers</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Suppliers</a></li>
          <li><a href="{{route('suppliers.create')}}">Add Suppliers</a></li>
          <li><a href="{{route('suppliers.list')}}">List Suppliers</a></li>
          <li><a href="#">Edit Suppliers</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Customers</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Customers</a></li>
          <li><a href="{{route('customers.create')}}">Add Customer</a></li>
          <li><a href="{{route('customers.list')}}">List Customer</a></li>
          <li><a href="#">Edit Customer</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Stock</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Stock</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Transactions</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Transactions</a></li>
        </ul>
      </li>
      
      
      <!-- <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li> -->
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name">Profile</div>
        <div class="job">Admin</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    @includeWhen($errors->any(),'_errors')
    @if(session('success'))
            <div class="flash-success">
                {{session('success')}}
            </div>
            @endif
    @yield('content')
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });

  $(document).ready( function () {
    $('#mytable').DataTable();
} );
  </script>
  
</body>
</html>
