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
                    
                       

                <tr class="border-b border-gray-100 dark:border-gray-800 relative">

                <?php foreach ($rows as $column => $value): ?>

                    <?php if($column === 'status'): ?>
                        <td class="px-5 py-4 sm:px-6">
                            <a href="/post?id=<?= $rows['id'] ?>" class="absolute inset-0"></a>
                            <?php if ($value === 'unpublished'): ?>
                                 <span class="bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500 inline-flex items-center justify-center gap-1 rounded-full px-2.5 py-0.5 text-sm font-medium">
                                <?= ucwords(str_replace('_', ' ', $value)); ?>

                                
                            </span>
                            <?php elseif ($value === 'published'): ?>
                                  <span class="bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500 inline-flex items-center justify-center gap-1 rounded-full px-2.5 py-0.5 text-sm font-medium">
                                    <?= ucwords(str_replace('_', ' ', $value)); ?>
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center justify-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-700 dark:bg-white/5 dark:text-white/80">
                                    <?= ucwords(str_replace('_', ' ', $value)); ?>
                                </span>

                        <?php endif; ?>
                       
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