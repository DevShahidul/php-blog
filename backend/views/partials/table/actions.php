
<?php
// Expects: $actions, $row, and optionally $csrfToken.

require_once __DIR__ . '/helpers.php';
?>

<div class="flex items-center justify-end gap-3">
    <?php foreach ($actions as $action): ?>
        <?php
        $urlResolver = $action['url'] ?? null;
        $url = is_callable($urlResolver)
            ? $urlResolver($row)
            : null;

        $method = strtoupper($action['method'] ?? 'GET');
        $label = $action['label'] ?? 'Action';
        $class = $action['class']
            ?? 'text-brand-500 hover:text-brand-600';
        ?>

        <?php if (!is_string($url) || $url === ''): ?>
            <?php continue; ?>
        <?php endif; ?>

        <?php if ($method === 'POST'): ?>
            <form
                method="POST"
                action="<?= table_escape($url) ?>"
                onsubmit="return confirm('<?= table_escape($action['confirm'] ?? 'Are you sure?') ?>')"
            >
                <?php if (isset($csrfToken)): ?>
                    <input
                        type="hidden"
                        name="_token"
                        value="<?= table_escape($csrfToken) ?>"
                    >
                <?php endif; ?>

                <button
                    type="submit"
                    class="text-theme-xs font-medium <?= table_escape($class) ?>"
                >
                    <?= table_escape($label) ?>
                </button>
            </form>
        <?php else: ?>
            <a
                href="<?= table_escape($url) ?>"
                class="text-theme-xs font-medium <?= table_escape($class) ?>"
            >
                <?= table_escape($label) ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
