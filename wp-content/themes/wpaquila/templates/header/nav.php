<?php 
/**
 * Navbar Template
 * 
 * @package wpaquila
 */ 

$menu_class = \Aquila_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('aquila-header-menu');

$header_menu = wp_get_nav_menu_items($header_menu_id);
?>
<nav class="navbar navbar-default">
    <div class="container">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
            ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php 
                if (!empty($header_menu) && is_array($header_menu)) {
                    ?>
                    <ul class="nav navbar-nav">
                        <?php 
                            foreach ($header_menu as $menu_item) {
                                if (!$menu_item->menu_item_parent) {
                                    $child_menu_items = $menu_class->get_child_menu_items($header_menu, $menu_item->ID);
                                    $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                                    if (!$has_children) {
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url($menu_item->url); ?>">
                                                <?php echo esc_html($menu_item->title); ?>
                                            </a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="dropdown">
                                            <a href="<?php echo esc_url($menu_item->url); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <?php echo esc_html($menu_item->title); ?> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php 
                                                    foreach ($child_menu_items as $child_menu_item) {
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($child_menu_item->url); ?>">
                                                                <?php echo esc_html($child_menu_item->title); ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    </ul>
                    <?php
                }
            ?>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        
    </div><!-- /.container-fluid -->
    </div>
</nav>
