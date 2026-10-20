<?php

$item = $item ?? [];
$path = $path ?? '';
$currentPath = $currentPath ?? '/';

$title = $item['title'] ?? '';
$route = $path ?? null;
$icon = $item['icon'] ?? null;
$translation = $item['translation'] ?? null;
$children = $item['children'] ?? [];

$hasChildren = !empty($children);
$hasRoute = !empty($route);

$isActive = $hasRoute && $currentPath === $route;

// Check whether this item or any descendant matches the current URL.
$isDescendantActive = static function (array $items) use (&$isDescendantActive, $currentPath): bool {
    foreach ($items as $path => $child) {
        if ( $path === $currentPath ) {
            return true;
        }

        if (
            !empty($child['children']) &&
            $isDescendantActive($child['children'])
        ) {
            return true;
        }
    }

    return false;
};

$containsActive = $hasChildren && $isDescendantActive($children);

$menuKey = 'menu-' . trim($path, '/');
$menuKey = $menuKey === 'menu-' ? 'menu-dashboard' : $menuKey;

$label = $translation
    ? '$t(' . json_encode($translation) . ')'
    : null;
?>


<!-- Menu Item Ui Elements -->
<li>
    <?php if ($hasChildren): ?>
        <a href="#"
            @click.prevent="selected = (selected === <?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?> ? '':<?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>)"
            class="menu-item group"
            :class="(selected === <?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>) || <?= $containsActive ? 'true' : 'false' ?> ? 'menu-item-active' : 'menu-item-inactive'">
            <?php if ($icon): ?>
                <?= $icon ?>
            <?php endif; ?>

            <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''" <?php if ($translation): ?>
                    x-text="<?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>" <?php endif; ?>>
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
            </span>

            <svg class="menu-item-arrow"
                :class="[(selected === <?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>) ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive', sidebarToggle ? 'xl:hidden' : '' ]"
                width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke="" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>

        <!-- Dropdown Menu Start -->
        <div class="translate transform overflow-hidden" x-cloak x-show="selected === <?= htmlspecialchars(
            json_encode($menuKey),
            ENT_QUOTES,
            'UTF-8'
        ) ?>" x-transition>
            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                class="menu-dropdown mt-2 flex flex-col gap-1 pl-9 rtl:pr-9 rtl:pl-0">
                <?php foreach ($children as $childPath => $child): ?>
                    <?php
                    $item = $child;
                    $path = $childPath;
                    include __DIR__ . '/nav-item.php';
                    ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- Dropdown Menu End -->


    <?php else: ?>

        <!-- Regular navigation link -->
        <a href="<?= htmlspecialchars($route, ENT_QUOTES, 'UTF-8') ?>"
            @click="selected = (selected === <?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?> ? '':<?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>)"
            class="menu-item group"
            :class=" (selected === <?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>) && <?= $containsActive ? 'true' : 'false' ?> ? 'menu-item-active' : 'menu-item-inactive'"
            :aria-expanded="<?= htmlspecialchars(json_encode($menuKey), ENT_QUOTES, 'UTF-8') ?>">
            <?php if ($icon): ?>
                <?= $icon ?>
            <?php endif; ?>

            <span class="menu-item-text" :class="sidebarToggle ? 'xl:hidden' : ''" <?php if ($translation): ?>
                    x-text="<?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>" <?php endif; ?>>
                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
            </span>
        </a>

    <?php endif; ?>


</li>
<!-- Menu Item Ui Elements -->