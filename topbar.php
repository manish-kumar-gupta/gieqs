<style>
.modal-backdrop
{
    opacity:0.7 !important;
}
</style>

<!--Topbar-->
<div id="navbar-top-main" class="navbar-top  navbar-dark bg-dark border-bottom">
      <div class="container px-0">
        <div class="navbar-nav align-items-center">
          <div class="d-none d-lg-inline-block">
            <span class="navbar-text mr-3">Ghent International Endoscopy Quality Symposium</span>
          </div>
          <div>
            <ul class="nav">
              <!--<li class="nav-item dropdown ml-lg-2">
                <a class="nav-link px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,10">
                  <img alt="Image placeholder" src="assets/img/icons/flags/us.svg">
                  <span class="d-none d-lg-inline-block">United States</span>
                  <span class="d-lg-none">EN</span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm">
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/es.svg">Spanish</a>
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/ro.svg">Romanian</a>
                  <a href="#" class="dropdown-item"><img alt="Image placeholder" src="assets/img/icons/flags/gr.svg">Greek</a>
                </div>
              </li>-->
            </ul>
          </div>
          <div class="ml-auto">
            <ul class="nav">
             <!-- <li class="nav-item">
                <a class="nav-link" href="pages/utility/support.html">Support</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" data-action="omnisearch-open" data-target="#omnisearch"><i class="fas fa-search"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/shop/checkout-cart.html"><i class="fas fa-shopping-cart"></i></a>
              </li>
            -->
              <li class="nav-item">
                <a class="nav-link" title="Registration" href="#" data-toggle="modal" data-target="#registerInterest"><i class="fas fa-user-plus"></i></a>
              </li>
            <!--
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  <h6 class="dropdown-header">User menu</h6>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user"></i>Account
                  </a>
                  <a class="dropdown-item" href="#">
                    <span class="float-right badge badge-primary">4</span>
                    <i class="fas fa-envelope"></i>Messages
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cog"></i>Settings
                  </a>
                  <div class="dropdown-divider" role="presentation"></div>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-sign-out-alt"></i>Sign out
                  </a>
                </div>
              </li>
            -->
              
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="registerInterest" tabindex="-1" role="dialog" aria-labelledby="registerInterestLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerInterestLabel" style="color: rgb(238, 194, 120);">Thank-you for your interest in GIEQs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span class="h6">Registration will open in late January 2020.  <br/> </span><span>Prior to this you can register your interest below and we will keep you updated on everything GIEQs.</span>
        <hr>
        <form id='pre-register'>
        <div class="form-group">
                              <label for="name">Name:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="please enter your name">
                                    </div>
                                    <label for="email">Email address:</label>
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="please enter your email address">
                                    </div>
</div>
</form>
        <hr>
        <span>Your email address will only be used to update you on GIEQs</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-small btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitPreRegister" type="button" class="btn-small text-black" style="background-color: rgb(238, 194, 120);">Submit</button>
      </div>
    </div>
  </div>
</div>