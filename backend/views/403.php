<?php require('partials/header.php'); ?>

<!-- ===== Page Wrapper Start ===== -->
    <div
      class="relative z-1 flex min-h-screen flex-col items-center justify-center overflow-hidden p-6"
    >
      <!-- ===== Common Grid Shape Start ===== -->
      <div
  class="absolute top-0 right-0 -z-1 w-full max-w-[250px] xl:max-w-[450px] rtl:right-auto rtl:left-0 rtl:-scale-x-100"
>
  <img src="<?= getHostUri(); ?>/public/src/images/shape/grid-01.svg" alt="grid" />
</div>
<div
  class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px] rtl:right-0 rtl:left-auto rtl:-scale-x-100"
>
  <img src="<?= getHostUri(); ?>/public/src/images/shape/grid-01.svg" alt="grid" />
</div>

      <!-- ===== Common Grid Shape End ===== -->

      <!-- Centered Content -->
      <div class="mx-auto w-full max-w-60.5 text-center sm:max-w-118">
        <h1
          class="text-title-md xl:text-title-2xl mb-8 font-bold text-gray-800 dark:text-white/90"
        >
          FORBIDDEN
        </h1>

        <span class="text-title-md xl:text-title-2xl font-bold text-gray-800 dark:text-white/90">403</span>

        <p
          class="mt-10 mb-6 text-base text-gray-700 sm:text-lg dark:text-gray-400"
        >
          You don't have permission to access this page. Please contact the administrator if you believe this is an error.
        </p>

        <a
          href="/"
          class="shadow-theme-xs inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200"
        >
          Back to Home Page
        </a>
      </div>
      <!-- Footer -->
      <p
        class="absolute bottom-6 left-1/2 -translate-x-1/2 text-center text-sm text-gray-500 dark:text-gray-400"
      >
        &copy; <span id="year"></span> - TailAdmin
      </p>
    </div>

    <!-- ===== Page Wrapper End ===== -->
<?php require('partials/footer.php'); ?>