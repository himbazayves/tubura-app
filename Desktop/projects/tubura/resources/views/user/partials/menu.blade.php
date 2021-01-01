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
                    <a href="#" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
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
                        <span class="micon dw dw-right-arrow1"></span><span class="mtext">Stocks </span>
                 
                      
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('stocks.index')}}">All Stocks</a></li>
                            <li><a href="{{route('stocks.create')}}">New Create  </a></li>
                        
                    </ul>
                    
                </li>



                



            
              
                
            
        
                
            
                
        
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>