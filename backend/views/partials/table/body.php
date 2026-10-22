
<?php
// Expects: $columns, $rows, $actions, and optionally $csrfToken.

require_once __DIR__ . '/helpers.php';
?>

<tbody>
    <?php if (empty($rows)): ?>
        <tr>
            <td
                colspan="<?= count($columns) + (!empty($actions) ? 1 : 0) ?>"
                class="px-5 py-10 text-center text-theme-sm text-gray-500 dark:text-gray-400"
            >
                <?= table_escape($emptyMessage ?? 'No records found.') ?>
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($rows as $row): ?>
            <?php require __DIR__ . '/row.php'; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
