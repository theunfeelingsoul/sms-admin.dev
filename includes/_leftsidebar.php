<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Person</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form  class="sidebar-form">
      <div class="input-group"> 
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      
     
     <!-- check the url and make the li active. $filename is in the _header.php page-->
      <?php if (strpos($filename, 'Contact') == true): ?>
        <li class="treeview active">
      <?php else: ?>
        <li>
      <?php endif; ?>
        <a href="#">
          <i class="fa fa-edit"></i> <span>Contacts</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="addContact.php"><i class="fa fa-circle-o"></i> Add contact</a></li>
          <li class=""><a href="viewContact.php"><i class="fa fa-circle-o"></i> View contacts</a></li>
        </ul>
      </li>
      
      <!-- check the url and make the li active. $filename is in the _header.php page-->
      <?php if (strpos($filename, 'sms') == true): ?>
        <li class="treeview active">
      <?php else: ?>
        <li>
      <?php endif; ?>
        <a href="#">
          <i class="fa fa-envelope"></i> <span>SMS</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="composesms.php"><i class="fa fa-circle-o"></i> Compose</a></li>
          <li class=""><a href="sentsms.php"><i class="fa fa-circle-o"></i> Sent</a></li>
          <li class=""><a href="draftsms.php"><i class="fa fa-circle-o"></i> Drafts</a></li>
          <!-- <li class=""><a href="read-mail.php"><i class="fa fa-circle-o"></i> Read</a></li> -->
        </ul>
      </li>
    
     
     
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>