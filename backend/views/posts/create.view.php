<?php require base_path('views/partials/header.php'); ?>

<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
  <?php require base_path('views/partials/sidebar/index.php'); ?>

  <!-- ===== Content Area Start ===== -->
  <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
    <!-- Small Device Overlay Start -->
    <div @click="sidebarToggle = false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
      class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
    <!-- Small Device Overlay End -->

    <?php require base_path('views/partials/topbar/index.php'); ?>

    <!-- ===== Main Content Start ===== -->
    <main>
      <div class="mx-auto max-w-(--breakpoint-2xl) p-4 pb-20 md:p-6 md:pb-6">
        <?php require base_path('views/partials/breadcrumb.php'); ?>

        <!-- Page content will go here -->

        <div class="space-y-5 sm:space-y-6">
          <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
            <div class="flex px-5 py-4 sm:px-6 sm:py-5">
              <h3 class="text-base font-medium text-gray-800 dark:text-white/90 grow">
                <?= htmlspecialchars($heading); ?>
              </h3>
              <a href="/posts"
                class="ml-auto text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400">
                Go back
              </a>
            </div>

            <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">

              <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="space-y-6">
                  <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
                    <div class="px-5 py-4 sm:px-6 sm:py-5">
                      <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Post details
                      </h3>
                    </div>
                    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                      <!-- Elements -->

                      <div>
                        <label
                          class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                          for="title"
                        >
                          Title
                        </label>
                        <input
                          type="text"
                          id="title"
                          name="title"
                          class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        />
                    </div>

                      <div>
                        <label
                          class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                          for="content"
                        >
                          Content
                        </label>
                        <textarea placeholder="Enter the post content..." type="text" rows="6"
                          class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                          id="content"
                          name="content"
                        ></textarea>
                          <p class="text-theme-xs text-error-500">
                            Please enter the post content.
                          </p>
                      </div>
                      <div class="flex items-center gap-5">
                          <button
                            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition"
                          >
                            Submit
                          </button>
                          <button
                            class="shadow-theme-xs inline-flex items-center gap-2 rounded-lg bg-white px-4 py-3 text-sm font-medium text-gray-700 ring-1 ring-gray-300 transition ring-inset hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/3"
                          >
                           cancle
                          </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
<?php require base_path('views/partials/footer.php'); ?>