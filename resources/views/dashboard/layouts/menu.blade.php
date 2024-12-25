<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('dashboard/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hieu Ngo
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#cate">
                        <i class="fas fa-layer-group"></i>
                        <p>Product Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="cate">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{URL::to('/ProductCategory/list')}}">
                                    <span class="sub-item">List Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/ProductCategory/add')}}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#publisher">
                        <i class="fas fa-regular fa-print"></i>
                        <p>Publisher</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="publisher">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{URL::to('/Publisher/list')}}">
                                    <span class="sub-item">List Publisher</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/Publisher/add')}}">
                                    <span class="sub-item">Add Publisher</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>