<div id="header" class="page-header ">
    <div class="navbar navbar-expand-lg">
        <!-- brand -->
        <a href="index.html" class="navbar-brand d-lg-none">
            
            <img src="{{ asset('logo-databugar.png') }}" alt="...">
        </a>
        <!-- / brand -->
        <!-- Navbar collapse -->
        <ul class="nav navbar-menu order-1 order-lg-2">
            <li class="nav-item dropdown">
                <a class="nav-link px-2" data-toggle="dropdown">
                    <i data-feather="settings"></i>
                </a>
                <!-- ############ Setting START-->
                <div class="dropdown-menu dropdown-menu-center mt-3 w animate fadeIn">
                    <div class="setting px-3">
                        
                        <div class="mb-2">
                            <strong>Color:</strong>
                        </div>
                        <div>
                            <label class="radio radio-inline ui-check ui-check-md">
                                <input type="radio" name="bg" value="">
                                <i></i>
                            </label>
                            <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                                <input type="radio" name="bg" value="bg-dark">
                                <i class="bg-dark"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- ############ Setting END-->
            </li>
            <!-- Navarbar toggle btn -->
            
            <li class="nav-item d-lg-none">
                <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
                    <i data-feather="menu"></i>
                </a>
            </li>
        </ul>
    </div>
</div>