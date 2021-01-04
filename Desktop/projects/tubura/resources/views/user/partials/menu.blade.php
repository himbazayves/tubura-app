<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
            


                <li>
                    <a href="{{route('dashboard')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-list3"></span><span class="mtext">Stock</span>
                    </a>
                    <ul class="submenu">
                        

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-plug"></span><span class="mtext">Seed Stock</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="{{route('seed-stocks.index')}}">All seed stocks</a></li>
                                <li><a href="{{route('seed-stocks.create')}}">New seed stock</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-plug"></span><span class="mtext">Fertilizer Stock</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="{{route('fertilizer-stocks.index')}}">All fertilizer stocks</a></li>
                                <li><a href="{{route('fertilizer-stocks.create')}}">New fertilizer stock</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Farmers</span>
                 
                      
                    </a>
                    <ul class="submenu">
                    <li><a href="{{route('farmers.index')}}">All Farmers</a></li>
                        <li><a href="{{route('farmers.create')}}">New farmer </a></li>
                    
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Seed Requests</span>
                 
                      
                    </a>
                    <ul class="submenu">
                    <li><a href="{{route('seed-requests.index')}}">All Seed requests</a></li>
                        <li><a href="{{route('seed-requests.create')}}">New seed request </a></li>
                    
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Fertilizer Requests</span>
                 
                      
                    </a>
                    <ul class="submenu">
                    <li><a href="{{route('fertilizer-requests.index')}}">All Fertilizer requests</a></li>
                        <li><a href="{{route('fertilizer-requests.create')}}">New Fertilizer request </a></li>
                    
                    </ul>
                </li>


               
               


                


                

               


                



               



                



            
              
                
            
        
                
            
                
        
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>