<nav class="navbar navbar-expand-lg bg-light bg-gradient sticky-top shadow-sm mb-3">
  <div class="container-fluid">
    <a class="navbar-brand item-center" href="/">
      Checksheet Management <br> System
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
        <?php
          $session = \Config\Services::session();
          if($session->get('empid')){
            echo '
            <li class="nav-item">
              <a class="nav-link" href="'.base_url().'input"><i class="fas fa-plus-circle"></i> Input</a>
            </li>';
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>history"><i class="fas fa-history"></i> History</a>
        </li>
        <?php
          if($session->get('state') == 'Approver' || $session->get('state') == 'Admin'){
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'approve"><i class="fas fa-thumbs-up"></i> Approve</a>
            </li>';
          }
          else if(!$session->get('empid')){
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'login"><i class="fas fa-sign-in-alt"></i> Login</a>
            </li>';
          }
          
          if($session->get('isadmin')){
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'production"><i class="fas fa-industry"></i> Production</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'startup"><i class="fas fa-rocket"></i> Startup</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'foregoing"><i class="fas fa-industry"></i> Foregoing</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'log-activity"><i class="fas fa-clipboard-list"></i> Log Activity</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'process"><i class="fas fa-cogs"></i> Process</a>
            </li>';
            echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url().'device"><i class="fas fa-desktop"></i> Device</a>
            </li>';
            // MENU BARU: Machine List
           echo '<li class="nav-item">
              <a class="nav-link" href="'.base_url('machine').'"><i class="fas fa-server"></i> Machine</a>
            </li>';
          }
          if($session->get('empid')){
            echo '<li class="nav-item">
              <a href="'.base_url().'logout" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Log Out
              </a>
            </li>';
        }
        ?>
      </ul>
    </div>
    <?php 
      if($session->get('empid')){
        echo '<div class="float-right me-5">
        <p class="m-0"><i class="fas fa-user"></i> '.$session->get('name').'</p>
        </div>';
      }
    ?>
  </div>
</nav>