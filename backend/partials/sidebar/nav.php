<?php

$nav = require __DIR__ . '/../../config/navigation.php';

// Normalize the requested path and remove query strings.
$currentPath = parse_url(
    $_SERVER['REQUEST_URI'] ?? '/',
    PHP_URL_PATH
) ?: '/';

$currentPath = '/' . trim($currentPath, '/');

if ($currentPath !== '/') {
    $currentPath = rtrim($currentPath, '/');
}


function findActiveParent(
    array $items,
    string $currentPath
): ?string {
    foreach ($items as $path => $item) {
        $children = $item['children'] ?? [];

        if (!empty($children)) {
            foreach ($children as $childPath => $child) {
                if ($childPath === $currentPath) {
                    return 'menu-' . trim($path, '/');
                }
            }

            $nested = findActiveParent($children, $currentPath);

            if ($nested !== null) {
                return $nested;
            }

            // If a deeper descendant is active, open this parent too.
            foreach ($children as $childPath => $child) {
                if (
                    !empty($child['children']) &&
                    findActiveParent(
                        [$childPath => $child],
                        $currentPath
                    ) !== null
                ) {
                    return 'menu-' . trim($path, '/');
                }
            }
        }
    }

    return null;
}

$activeParent = findActiveParent($nav, $currentPath);
$initialSelected = $activeParent ?? '';

?>

<!-- Sidebar Menu -->


<nav x-data="{selected: $persist(
    <?= htmlspecialchars(json_encode($initialSelected), ENT_QUOTES, 'UTF-8') ?>
).as('sidebar-selected')}">
    <!-- Menu Group -->
    <div>
        <h3 class="mb-4 text-xs leading-5 text-gray-400 uppercase">
            <span class="menu-group-title" :class="sidebarToggle ? 'xl:hidden' : ''"
                x-text="$t('sidebar.groups.menu')">MENU</span>

            <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto fill-current menu-group-icon"
                width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                    fill="" />
            </svg>
        </h3>

        <ul class="mb-6 flex flex-col gap-1">
            <?php foreach ($nav as $path => $item): ?>
                <?php
                include __DIR__ . '/nav-item.php';
                ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
<!-- Sidebar Menu -->