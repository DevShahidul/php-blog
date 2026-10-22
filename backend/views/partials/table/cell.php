
<?php
// Expects: $column and $row

require_once __DIR__ . '/helpers.php';
?>

<td class="px-5 py-4 sm:px-6">
    <div class="text-theme-sm text-gray-500 dark:text-gray-400">
        <?php table_render_cell($column, $row); ?>
    </div>
</td>
