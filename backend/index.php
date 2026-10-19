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

      </div>
    </main>
    <!-- ===== Main Content End ===== -->
  </div>
  <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
<?php require('partials/footer.php'); ?>