<div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="#"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i> Create Quiz </a>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-inbox"></i>View Quiz <b class="label green pull-right">
                                </b> </a></li>
                            
                        </ul>

                        <ul class="widget widget-menu unstyled">
                            
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i> Create Question </a>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-inbox"></i>View Question <b class="label green pull-right">
                                </b> </a></li>
                            
                        </ul>
                        <!--/.widget-nav-->
                          <ul class="widget widget-menu unstyled">
                            
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i> Create User </a>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-inbox"></i>View User <b class="label green pull-right">
                                </b> </a></li>
                            
                        </ul>
                        <!--/.widget-nav-->
                         </ul>
                        <!--/.widget-nav-->
                          <ul class="widget widget-menu unstyled">
                            
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i>  Assign Exam </a>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-inbox"></i>View User Exam <b class="label green pull-right">
                                </b> </a></li>
                            
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i>View Result </a>
                            </li>
                            
                            
                        </ul>

                        
                    
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            
                            <li>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                   <i class="icon-inbox"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->