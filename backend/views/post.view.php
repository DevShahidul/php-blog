<?php require('partials/header.php'); ?>

<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
  <?php require('partials/sidebar/index.php'); ?>

  <!-- ===== Content Area Start ===== -->
  <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
    <!-- Small Device Overlay Start -->
    <div @click="sidebarToggle = false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
      class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
    <!-- Small Device Overlay End -->

    <?php require('partials/topbar/index.php'); ?>

    <!-- ===== Main Content Start ===== -->
    <main>
      <div class="mx-auto max-w-(--breakpoint-2xl) p-4 pb-20 md:p-6 md:pb-6">
        <?php require('partials/breadcrumb.php'); ?>

        <!-- Page content will go here -->

        <div class="space-y-5 sm:space-y-6">
          <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
            <div class="flex px-5 py-4 sm:px-6 sm:py-5">
              <h3 class="text-base font-medium text-gray-800 dark:text-white/90 grow">
                <?= htmlspecialchars($postTitle); ?>
              </h3>
              <a href="/posts" class="ml-auto text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400">
                Go back
              </a>
            </div>

            <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">

              <?= htmlspecialchars($postContent); ?>
            
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
<?php require('partials/footer.php'); ?>