<nav role="navigation" class="site-navigation main-navigation primary use-sticky-menu mobile-navigation">

    <div class="full-container">
        <div id="search-icon-container">
            <div id="search-icon"><div class="vantage-icon-search"></div></div>

            <form method="get" class="searchform" action="http://demo.siteorigin.com/vantage/" role="search">
                <input type="text" class="field" name="s" value="" placeholder="Search">
            </form>
        </div>

        <?= wp_nav_menu(array('menu' => 'Header Menu')); ?>

        <div id="so-mobilenav-mobile-1" data-id="1" class="so-mobilenav-mobile"></div>
        <div class="menu-mobilenav-container">
            <ul id="mobile-nav-item-wrap-1" class="menu">
                <li><a href="#" class="mobilenav-main-link" data-id="1"><span class="mobile-nav-icon"></span>Menu</a></li>
            </ul>
        </div>
    </div>
</nav>