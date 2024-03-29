<body class="g-sidenav-show  bg-gray-200">
    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <script>
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">dashboard</i></div><span class="nav-link-text ms-1">Dashboard</span>' . __(''), ['controller' => 'Admin', 'action' => 'dashboard'], ['escape' => false, 'title' => __('Dashboard'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">table_view</i></div><span class="nav-link-text ms-1">Tables</span>' . __(''), ['controller' => 'Admin', 'action' => 'tables'], ['escape' => false, 'title' => __('Tables'), 'class' => 'nav-link text-white active bg-gradient-primary']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-upload opacity-10"></i></div><span class="nav-link-text ms-1">Add Product</span>' . __(''), ['controller' => 'Admin', 'action' => 'addproduct'], ['escape' => false, 'title' => __('Tables'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">person</i></div><span class="nav-link-text ms-1">Profile</span>' . __(''), ['controller' => 'Admin', 'action' => 'profile'], ['escape' => false, 'title' => __('Profile'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-right-from-bracket"></i></div><span class="nav-link-text ms-1">Log Out</span>' . __(''), ['controller' => 'Admin', 'action' => 'logout'], ['escape' => false, 'title' => __('Log Out'), 'class' => 'nav-link text-white']) ?>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Tables</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <?= $this->Form->create(null, ['type' => 'get']) ?>
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" id='key' name="key" class="form-control">
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/material?ref=navbar-dashboard">Online Builder</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <?= $this->Html->link('<i class="fa-solid fa-right-from-bracket"></i><span class="d-sm-inline d-none">Log Out</span>' . __(''), ['controller' => 'Admin', 'action' => 'logout'], ['escape' => false, 'title' => __('Log Out'), 'class' => 'nav-link text-body font-weight-bold px-0']) ?>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <?= $this->Flash->render() ?>

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Users table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone No.</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                            <th class="text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                            <th class="text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $user) {
                                        ?>
                                            <tr>
                                                <td class='text-center'>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <?= $this->Html->image($user->profile_image, ['class' => 'avatar avatar-sm me-3 border-radius-lg']) ?>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?= $user->name ?></h6>
                                                            <p class="text-xs text-secondary mb-0"><?= $user->email ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='text-center'>
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $user->contact ?></span>
                                                </td>
                                                <td class='text-center'>
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $user->address ?></span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <label class="switch">
                                                        <input type="hidden" value="<?= $user->id ?>">
                                                        <input type="checkbox" value="<?= $this->Number->format($user->status) ?>" <?php echo ($user->status == 1) ? 'checked' : '' ?> class="inac">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $user->created_date ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $user->modified_date ?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $this->Html->link(__('View'), ['action' => 'viewuser', $user->id], ['class' => 'btn btn-light text-secondary font-weight-bold text-xs']) ?>
                                                    <?= $this->Html->link(__('Edit'), ['action' => 'edituser', $user->id], ['class' => 'btn btn-success text-secondary font-weight-bold text-xs']) ?>
                                                    <a href="" class=" text-secondary font-weight-bold text-xs editUser">Edit</a>
                                                    <input type="hidden" value="<?= $user->id ?>">
                                                    <a href="" class=" text-secondary font-weight-bold text-xs deleteUser">Delete</a>
                                                    <input type="hidden" value="<?= $user->id ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===============================user edit model ==================================== -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">update details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?= $this->Form->create(null, ['id' => 'useredit', 'type' => 'file']) ?>
                        <div class="modal-body">
                            <!--============= hidden image and id if image is not updated ============ -->
                            <input type="hidden" id="imagedd" name="imagedd">
                            <input type="hidden" id="iddd" name="iddd">
                            <!--============= hidden image and id if image is not updated ============ -->

                            <img src="" alt="" id='profile-image' width="100px">
                            <?php
                            // echo $this->Form->control('user_id', ['options' => $users]);
                            echo $this->Form->control('profile_image', ['type' => 'file']);
                            echo $this->Form->control('name');
                            echo $this->Form->control('contact');
                            echo $this->Form->control('address');
                            echo $this->Form->control('email');
                            // echo $this->Form->control('password');
                            ?>
                        </div>
                        <div class="modal-footer">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">close</button>
                            <input type="hidden" id="hiddendata">
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Category Table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Project</th>
                                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">No. of Product</th>
                                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Created date</th>
                                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7 ps-2">Modified date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $category) { ?>
                                            <tr>
                                                <td class='text-center'>
                                                    <div class="d-flex px-2">
                                                        <div>
                                                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm"><?= $category->category_name ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                                $i = 0;
                                                foreach ($category->products as $product) {
                                                    $i++;
                                                } ?>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?= $i ?></p>
                                                </td>
                                                <td class='text-center'>
                                                    <label class="switch">
                                                        <input type="hidden" value="<?= $category->id ?>">
                                                        <input type="checkbox" value="<?= $this->Number->format($category->status) ?>" <?php echo ($category->status == 0) ? 'checked' : '' ?> class="cat">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?= $category->created_date ?></p>
                                                </td>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?= $category->modified_date ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="" class="text-secondary font-weight-bold text-xs categoryUser">Delete</a>
                                                    <input type="hidden" value="<?= $category->id ?>">

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Products table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Product Title</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Category Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder  opacity-7 ps-2">Description</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder  opacity-7 ps-2">Product Tags</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Created Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Modified Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) { ?>
                                            <tr>
                                                <td class='text-center'>
                                                    <div class="d-flex px-2">
                                                        <div>
                                                            <?= $this->Html->image($product->product_image, ['class' => 'avatar avatar-sm me-3 border-radius-lg']) ?>
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm"><?= $product->product_title ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?= $product->product_category->category_name ?></p>
                                                </td>
                                                <td class='text-center'>
                                                    <label class="switch">
                                                        <input type="hidden" value="<?= $product->id ?>">
                                                        <input type="checkbox" value="<?= $this->Number->format($product->status) ?>" <?php echo ($product->status == 0) ? 'checked' : '' ?> class="prod">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?= substr($product->product_description, 0, 30) ?> ... </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?= substr($product->product_tags, 0, 30) ?>...</p>
                                                </td>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?= $product->created_date ?></p>
                                                </td>
                                                <td class='text-center'>
                                                    <p class="text-sm font-weight-bold mb-0"><?php
                                                                                                if ($product->modified_date == "")
                                                                                                    echo "---";
                                                                                                else echo $product->modified_date;
                                                                                                ?></p>
                                                </td>
                                                <td class="align-middle">
                                                    <?= $this->Html->link(__('View'), ['action' => 'viewproduct', $product->id], ['class' => 'text-secondary font-weight-bold text-xs']) ?>
                                                    <?= $this->Html->link(__('Edit'), ['action' => 'editproduct', $product->id], ['class' => 'text-secondary font-weight-bold text-xs']) ?>
                                                    <a href="" class="text-secondary font-weight-bold text-xs productUser">Delete</a>
                                                    <input type="hidden" value="<?= $product->id ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="fixed-plugin">
                <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                    <i class="material-icons py-2">settings</i>
                </a>
                <div class="card shadow-lg">
                    <div class="card-header pb-0 pt-3">
                        <div class="float-start">
                            <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                            <p>See our dashboard options.</p>
                        </div>
                        <div class="float-end mt-4">
                            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <!-- End Toggle Button -->
                    </div>
                    <hr class="horizontal dark my-1">
                    <div class="card-body pt-sm-3 pt-0">
                        <!-- Sidebar Backgrounds -->
                        <div>
                            <h6 class="mb-0">Sidebar Colors</h6>
                        </div>
                        <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors my-2 text-start">
                                <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                                <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                            </div>
                        </a>
                        <!-- Sidenav Type -->
                        <div class="mt-3">
                            <h6 class="mb-0">Sidenav Type</h6>
                            <p class="text-sm">Choose between 2 different sidenav types.</p>
                        </div>
                        <div class="d-flex">
                            <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                            <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                            <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                        </div>
                        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                        <!-- Navbar Fixed -->
                        <div class="mt-3 d-flex">
                            <h6 class="mb-0">Navbar Fixed</h6>
                            <div class="form-check form-switch ps-0 ms-auto my-auto">
                                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                            </div>
                        </div>
                        <hr class="horizontal dark my-3">
                        <div class="mt-2 d-flex">
                            <h6 class="mb-0">Light / Dark</h6>
                            <div class="form-check form-switch ps-0 ms-auto my-auto">
                                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                            </div>
                        </div>
                        <hr class="horizontal dark my-sm-4">
                        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
                        <div class="w-100 text-center">
                            <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                            <h6 class="mt-3">Thank you for sharing!</h6>
                            <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                                <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                                <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <script>
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                    var options = {
                        damping: '0.5'
                    }
                    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
            </script>
            <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/material-dashboard.min.js?v=3.0.4"></script>
        </div>
    </main>
</body>
<?= $this->Html->css('tables', ['block' => 'css']); ?>

<script>
    $(document).ready(function() {
        $('body').on('click', '.inac', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            var status = $(this).val();
            if (status == 1) {
                $(this).val('2');
            } else {
                $(this).val('1');
            }
            var id = $(this).prev('input').val();
            $.ajax({
                url: "http://localhost:8765/Admin/userstatus",
                type: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'status': status,
                },
                success: function(response) {
                    // alert(response)
                }
            });
        });
        $('body').on('click', '.cat', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            var status = $(this).val();
            if (status == 1) {
                $(this).val('0');
            } else {
                $(this).val('1');
            }
            var id = $(this).prev('input').val();
            $.ajax({
                url: "http://localhost:8765/Admin/productcatstatus",
                type: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'status': status,
                },
                success: function(response) {
                    // alert(response)
                }
            });
        });
        $('body').on('click', '.prod', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            var status = $(this).val();
            if (status == 1) {
                $(this).val('0');
            } else {
                $(this).val('1');
            }
            var id = $(this).prev('input').val();
            $.ajax({
                url: "http://localhost:8765/Admin/productstatus",
                type: "JSON",
                method: "POST",
                data: {
                    'id': id,
                    'status': status,
                },
                success: function(response) {
                    // alert(response)
                }
            });
        });
    })
</script>