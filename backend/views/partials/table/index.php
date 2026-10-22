<div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/3">
    <div class="custom-scrollbar max-w-full overflow-x-auto">
        <table class="w-full min-w-275.5">
            <thead>
                <tr class="border-b border-gray-100 dark:border-gray-800">
                    <?php foreach ($columns as $column): ?>
                        <th
                            scope="col"
                            class="px-5 py-3 text-left sm:px-6 rtl:text-right"
                            data-id="<?= $column['key']; ?>"
                        >
                            <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">
                                <?= $column['label'] ?>
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
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $rows): ?>
                    
                       

                <tr class="border-b border-gray-100 dark:border-gray-800">

                <?php foreach ($rows as $column => $value): ?>

                    <?php if($column === 'status'): ?>
                        <td class="px-5 py-4 sm:px-6">
                        <p
                            class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-block rounded-full px-2 py-0.5 font-medium">
                            <?= $value ?>
                        </p>
                    </td>
                    <?php else: ?>

                    <td class="px-5 py-4 sm:px-6" <?php if ($column === 'title') echo 'colspan="1"'; ?>>
                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                            <?= $value ?>
                        </p>
                    </td>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tr>
                <?php endforeach; 
                    endif;
                ?>
            </tbody>
        </table>
    </div>
</div>