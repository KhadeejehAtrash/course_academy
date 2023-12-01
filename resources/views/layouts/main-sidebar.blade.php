<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">


                    <!-- Courses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Courses-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">View Courses</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Courses-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Courses.index')}}">Courses</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>Register into a course<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li> <a href="{{route('Students.create')}}">Rejester into a course </a></li>
            
                        </ul>
                    </li>





                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
