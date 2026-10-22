
<?php
// Required: $columns and $rows
// Optional: $actions, $emptyMessage, $csrfToken

require_once __DIR__ . '/helpers.php';

$columns = $columns ?? [];
$rows = $rows ?? [];
$actions = $actions ?? [];
$emptyMessage = $emptyMessage ?? 'No records found.';
?>

<div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
    <div class="custom-scrollbar max-w-full overflow-x-auto">
        <table class="w-full min-w-275.5">
            <?php require __DIR__ . '/head.php'; ?>
            <?php require __DIR__ . '/body.php'; ?>
        </table>
    </div>
</div>