<?php include('./application/controllers/Authentication.php'); ?>
<?php
// $CI =& get_instance();
// $CI->load->model('User_model');
// $CI->load->model('Role_has_permission_model', 'rp');
// $CI->load->model('Permission_model');
// $user_id = $this->session->userData('user_id');
// $role_id = $CI->User_model->getAuthRoleId($user_id);
// $user_permissions = $CI->rp->getPermissionByRoleId($role_id);
// $total_permission = $CI->Permission_model->getSelectedData('name');

// //this total permissions are assigned to the user
// $role_based_permission = array_intersect($total_permission, $user_permissions);

?>
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
                <i>S.K.Aditya & Co.</i>
              <!-- <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
            </a>
          </h1>
        
          <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
            <?php if (in_array('user_can_see_dashboard', role_based_permission())) { ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url()?>dashboard/index" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Dashboard
                  </span>
                </a>
              </li>
              <?php } ?>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Interface
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./accordion.html">
                        Accordion
                      </a>
                      <a class="dropdown-item" href="./blank.html">
                        Blank page
                      </a>
                      <a class="dropdown-item" href="./badges.html">
                        Badges
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./buttons.html">
                        Buttons
                      </a>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                          Cards
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <div class="dropdown-menu">
                          <a href="./cards.html" class="dropdown-item">
                            Sample cards
                          </a>
                          <a href="./card-actions.html" class="dropdown-item">
                            Card actions
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <a href="./cards-masonry.html" class="dropdown-item">
                            Cards Masonry
                          </a>
                        </div>
                      </div>
                      <a class="dropdown-item" href="./colors.html">
                        Colors
                      </a>
                      <a class="dropdown-item" href="./datagrid.html">
                        Data grid
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./datatables.html">
                        Datatables
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./dropdowns.html">
                        Dropdowns
                      </a>
                      <a class="dropdown-item" href="./modals.html">
                        Modals
                      </a>
                      <a class="dropdown-item" href="./maps.html">
                        Maps
                      </a>
                      <a class="dropdown-item" href="./map-fullsize.html">
                        Map fullsize
                      </a>
                      <a class="dropdown-item" href="./maps-vector.html">
                        Vector maps
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./navigation.html">
                        Navigation
                      </a>
                      <a class="dropdown-item" href="./charts.html">
                        Charts
                      </a>
                      <a class="dropdown-item" href="./pagination.html">
                        
                        Pagination
                      </a>
                    </div>
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./placeholder.html">
                        Placeholder
                      </a>
                      <a class="dropdown-item" href="./steps.html">
                        Steps
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./stars-rating.html">
                        Stars rating
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./tabs.html">
                        Tabs
                      </a>
                      <a class="dropdown-item" href="./tables.html">
                        Tables
                      </a>
                      <a class="dropdown-item" href="./carousel.html">
                        Carousel
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./lists.html">
                        Lists
                      </a>
                      <a class="dropdown-item" href="./typography.html">
                        Typography
                      </a>
                      <a class="dropdown-item" href="./offcanvas.html">
                        Offcanvas
                      </a>
                      <a class="dropdown-item" href="./markdown.html">
                        Markdown
                      </a>
                      <a class="dropdown-item" href="./dropzone.html">
                        Dropzone
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./lightbox.html">
                        Lightbox
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./tinymce.html">
                        TinyMCE
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./inline-player.html">
                        Inline player
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                          Authentication
                        </a>
                        <div class="dropdown-menu">
                          <a href="./sign-in.html" class="dropdown-item">
                            Sign in
                          </a>
                          <a href="./sign-in-link.html" class="dropdown-item">
                            Sign in link
                          </a>
                          <a href="./sign-in-illustration.html" class="dropdown-item">
                            Sign in with illustration
                          </a>
                          <a href="./sign-in-cover.html" class="dropdown-item">
                            Sign in with cover
                          </a>
                          <a href="./sign-up.html" class="dropdown-item">
                            Sign up
                          </a>
                          <a href="./forgot-password.html" class="dropdown-item">
                            Forgot password
                          </a>
                          <a href="./terms-of-service.html" class="dropdown-item">
                            Terms of service
                          </a>
                          <a href="./auth-lock.html" class="dropdown-item">
                            Lock screen
                          </a>
                        </div>
                      </div>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                          
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 14l6 0" /></svg>
                          Error pages
                        </a>
                        <div class="dropdown-menu">
                          <a href="./error-404.html" class="dropdown-item">
                            404 page
                          </a>
                          <a href="./error-500.html" class="dropdown-item">
                            500 page
                          </a>
                          <a href="./error-maintenance.html" class="dropdown-item">
                            Maintenance page
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li> -->
              <?php if (in_array('user_can_see_user', role_based_permission()) || in_array('user_can_see_roles', role_based_permission()) || in_array('user_can_see_permission', role_based_permission())) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Users
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <?php if (in_array('user_can_see_user', role_based_permission())) { ?>
                      <a class="dropdown-item" href="<?= base_url()?>user/index" rel="noopener">
                        User
                      </a>
                    <?php } ?>
                    <?php if (in_array('user_can_see_roles', role_based_permission())) { ?>
                    <a class="dropdown-item" href="<?= base_url()?>roles/index">
                      Roles
                    </a>
                    <?php } ?>
                    <?php if (in_array('user_can_see_permission', role_based_permission())) { ?>
                    <a class="dropdown-item" href="<?= base_url()?>permissions/index" rel="noopener">
                      Permission
                    </a>
                    <?php } ?>
                  </div>
                </li>
              <?php } ?>

              <?php if (in_array('user_can_see_product_list', role_based_permission())) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Inventory
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                      <?php if (in_array('user_can_see_product_list', role_based_permission())) { ?>
                        <a class="dropdown-item" href="<?php echo base_url() . 'product/index'?>">
                          Product List
                        </a>
                      <?php } ?>
                        <!-- <a class="dropdown-item" href="./cookie-banner.html">
                          Cookie banner
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./activity.html">
                          Activity
                        </a>
                        <a class="dropdown-item" href="./gallery.html">
                          Gallery
                        </a>
                        <a class="dropdown-item" href="./invoice.html">
                          Invoice
                        </a>
                        <a class="dropdown-item" href="./search-results.html">
                          Search results
                        </a>
                        <a class="dropdown-item" href="./pricing.html">
                          Pricing cards
                        </a>
                        <a class="dropdown-item" href="./pricing-table.html">
                          Pricing table
                        </a>
                        <a class="dropdown-item" href="./faq.html">
                          FAQ
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./users.html">
                          Users
                        </a>
                        <a class="dropdown-item" href="./license.html">
                          License
                        </a> -->
                      </div>
                      <!-- <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="./logs.html">
                          Logs
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./music.html">
                          Music
                        </a>
                        <a class="dropdown-item" href="./photogrid.html">
                          Photogrid
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./tasks.html">
                          Tasks
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./uptime.html">
                          Uptime monitor
                        </a>
                        <a class="dropdown-item" href="./widgets.html">
                          Widgets
                        </a>
                        <a class="dropdown-item" href="./wizard.html">
                          Wizard
                        </a>
                        <a class="dropdown-item" href="./settings.html">
                          Settings
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./trial-ended.html">
                          Trial ended
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./job-listing.html">
                          Job listing
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <a class="dropdown-item" href="./page-loader.html">
                          Page loader
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                      </div> -->
                    </div>
                  </div>
                </li>
              <?php } ?>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Help
                  </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                    Documentation
                  </a>
                  <a class="dropdown-item" href="./changelog.html">
                    Changelog
                  </a>
                  <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
                    Source code
                  </a>
                  <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank" rel="noopener">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    Sponsor project!
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </aside>
