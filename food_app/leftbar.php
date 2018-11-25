      <?php 
		$menu   = "";
		$create = "";
		$all    = "";
		if (preg_match("/admin/", $_SERVER['REQUEST_URI'])){
			$menu = "active";		
		}elseif(preg_match("/all/", $_SERVER['REQUEST_URI'])){
			$all = "active";	
		}elseif(preg_match("/new_order/", $_SERVER['REQUEST_URI'])){
			$create = "active";
		}
		error_log("link $menu, $create, $all");
      ?>
	<aside id="left-sidebar-nav" style="height:100%">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
           <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
                 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            </li>
            <li class="bold <?php echo $menu ?> >"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Food Menu</a>
            <li class="bold <?php echo $create ?>"><a href="new_order.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i>Create Order</a>
            </li>
            <li class="bold <?php echo $all ?>"><a href="all-orders.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> All Orders</a>
            </li>
        </ul>
        </aside>

