<!-- ===== Sidebar Start ===== -->
<aside :class="sidebarToggle ? 'translate-x-0 xl:w-22.5' : '-translate-x-full rtl:translate-x-full'"
    class="sidebar fixed top-0 left-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-auto border-r border-gray-200 bg-white px-5 transition-all duration-300 xl:static xl:translate-x-0 rtl:right-0 rtl:left-auto rtl:border-r-0 rtl:border-l dark:border-gray-800 dark:bg-black"
    @click.outside="if (window.innerWidth < 1280) sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="sidebar-header flex items-center gap-2 pt-8 pb-7">
        <a href="/">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="dark:hidden" src="src/images/logo/logo.svg" alt="Logo" />
                <img class="hidden dark:block" src="src/images/logo/logo-dark.svg" alt="Logo" />
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'" src="src/images/logo/logo-icon.svg"
                alt="Logo" />
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <?php require('nav.php'); ?>
    </div>
</aside>

<!-- ===== Sidebar End ===== -->