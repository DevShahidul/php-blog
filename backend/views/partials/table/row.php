
<?php
// Expects: $columns, $row, $actions, and optionally $csrfToken.

require_once __DIR__ . '/helpers.php';
?>

<tr class="border-b border-gray-100 dark:border-gray-800">
    <?php foreach ($columns as $column): ?>
        <?php require __DIR__ . '/cell.php'; ?>
    <?php endforeach; ?>

    <?php if (!empty($actions)): ?>
        <td class="px-5 py-4 sm:px-6">
            <?php require __DIR__ . '/actions.php'; ?>
        </td>
    <?php endif; ?>
</tr>
