<table id="dataTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <?php foreach ($columns as $index => $column): ?>
            <th scope="col" class="text-center"><?php echo $column->shortLabel; ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php if (count($data) > 0): ?>
        <?php foreach ($data as $datum): ?>
            <tr>
                <?php foreach ($columns as $column): ?>
                    <td><?php echo $this->dataTransform($column->type, $datum->{$column->name}); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="<?php echo count($columns) ?>" class="text-center">No Data Found</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
