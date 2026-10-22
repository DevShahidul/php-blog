
<?php
// Expects: $columns

require_once __DIR__ . '/helpers.php';
?>

<thead>
    <tr class="border-b border-gray-100 dark:border-gray-800">
        <?php foreach ($columns as $column): ?>
            <th
                scope="col"
                class="px-5 py-3 text-left sm:px-6 rtl:text-right"
            >
                <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                    <?= table_escape($column['label'] ?? '') ?>
                </p>
            </th>
        <?php endforeach; ?>

        <?php if (!empty($actions)): ?>
            <th
                scope="col"
                class="px-5 py-3 text-right sm:px-6 rtl:text-left"
            >
                <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                    Actions
                </p>
            </th>
        <?php endif; ?>
    </tr>
</thead>