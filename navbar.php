<?php 
  include_once 'style.php';
  if (!isset($_SESSION["id"]))
  {
    header("location:index.php");
  }

?>
<html lang="en">
<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
    <a class="navbar-brand" href="home.php"><i class="material-icons">add_shopping_cart</i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="products.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="Inventory.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right">
          <a class="nav-link" href="manufacturers.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Manufacturers</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <button class = "btn btn-danger">@<?php echo $_SESSION['Username'];?></button>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"><strong>Logout</strong></span>
          </a>
        </li>
       </ul>
    </div>
  </nav>
  
    <!-- Bootstrap core JavaScript-->
    <?php include 'js.php';?>
    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

    </script>
  </div>
</body>

</html>
