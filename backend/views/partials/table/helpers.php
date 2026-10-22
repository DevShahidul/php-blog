
<?php

declare(strict_types=1);

if (!function_exists('table_escape')) {
    function table_escape(mixed $value): string
    {
        return htmlspecialchars(
            (string) ($value ?? ''),
            ENT_QUOTES | ENT_SUBSTITUTE,
            'UTF-8'
        );
    }
}

if (!function_exists('table_value')) {
    /**
     * Retrieve a field from an array or object.
     * Supports nested keys such as user.name.
     */
    function table_value(mixed $row, string $key, mixed $default = null): mixed
    {
        foreach (explode('.', $key) as $segment) {
            if (is_array($row) && array_key_exists($segment, $row)) {
                $row = $row[$segment];
            } elseif (is_object($row) && isset($row->{$segment})) {
                $row = $row->{$segment};
            } else {
                return $default;
            }
        }

        return $row ?? $default;
    }
}

if (!function_exists('table_render_cell')) {
    function table_render_cell(array $column, mixed $row): void
    {
        $key = $column['key'] ?? '';
        $type = $column['type'] ?? 'text';
        $value = $key !== '' ? table_value($row, $key) : null;

        switch ($type) {
            case 'status':
                $status = strtolower((string) $value);

                $classes = match ($status) {
                    'published', 'active', 'success' =>
                        'bg-success-50 text-success-700 dark:bg-success-500/15 dark:text-success-500',
                    'draft', 'pending' =>
                        'bg-warning-50 text-warning-700 dark:bg-warning-500/15 dark:text-warning-400',
                    'archived', 'inactive' =>
                        'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                    'rejected', 'deleted' =>
                        'bg-error-50 text-error-700 dark:bg-error-500/15 dark:text-error-500',
                    default =>
                        'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                };

                echo '<span class="inline-block rounded-full px-2 py-0.5 text-theme-xs font-medium '
                    . $classes . '">'
                    . table_escape(ucfirst($status ?: 'unknown'))
                    . '</span>';
                break;

            case 'date':
                if ($value !== null && $value !== '') {
                    try {
                        $date = new DateTimeImmutable((string) $value);
                        $format = $column['format'] ?? 'M j, Y';
                        echo table_escape($date->format($format));
                    } catch (Exception) {
                        echo '&mdash;';
                    }
                } else {
                    echo '&mdash;';
                }
                break;

            case 'image':
                if ($value !== null && $value !== '') {
                    // Prefer storing an application-relative image path.
                    // Validate paths or use a trusted URL resolver for uploads.
                    $src = is_callable($column['image_url'] ?? null)
                        ? ($column['image_url'])($value, $row)
                        : $value;

                    if (is_string($src) && $src !== '') {
                        echo '<img src="' . table_escape($src)
                            . '" alt="' . table_escape($column['alt'] ?? 'Image')
                            . '" class="h-10 w-10 rounded-lg object-cover">';
                    } else {
                        echo '&mdash;';
                    }
                } else {
                    echo '&mdash;';
                }
                break;

            case 'callback':
                // Only use trusted application-defined render callbacks.
                if (is_callable($column['render'] ?? null)) {
                    ($column['render'])($value, $row);
                } else {
                    echo '&mdash;';
                }
                break;

            default:
                echo table_escape($value ?? '—');
        }
    }
}
