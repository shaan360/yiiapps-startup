<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<div class="view">

    <?php /*
    <b><?= "<?= CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:" ?></b>
    <?=
    "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}),array('view','id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n"
    ;
    $count = 0;
    foreach ($this->tableSchema->columns as $column) {
        if ($column->isPrimaryKey) {
            continue;
        }
        if (++$count == 7) {
            echo "\t<?php /*\n";
        }
        echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
        echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
    }
    if ($count >= 7) {
        echo "\t* / ?>\n";
    }*/
    ?>

    <?php foreach ($this->getTableSchema()->columns as $column) : ?>
    <?php if (!$column->isPrimaryKey && !in_array(
        strtolower($column->name),
        $this->passwordFields
    )
    ): ?>
        <?php
        $columnName = $column->name;
        if ($column->isForeignKey) {
            $relations = $this->getRelations();
            foreach ($relations as $relationName => $relation) {
                if ($relation[2] == $columnName) {
                    $relatedModel = CActiveRecord::model($relation[1]);
                    $columnName = $relationName . '->' . AweCrudCode::getIdentificationColumnFromTableSchema(
                        $relatedModel->tableSchema
                    );
                }
            }
        }
        ?>

        <?php if (!in_array($column->dbType, $this->booleanTypes)): ?>
            <?= "<?php if (!empty(\$data->{$columnName})): ?>\n" ?>
            <?php endif; ?>
        <div class="field">
            <div class="field_name">
                <b><?= "<?= CHtml::encode(\$data->getAttributeLabel('{$column->name}')) ?>" ?>:</b>
            </div>
            <div class="field_value">
                <?php if (in_array($column->dbType, $this->dateTypes)): ?>
                <?= "<?= Yii::app()->getDateFormatter()->formatDateTime(\$data->{$columnName}, 'medium', 'medium') ?>\n" ?>
                <br/>
                <?= " <?= date('D, d M y H:i:s', strtotime(\$data->" . $columnName . ")) ?>\n" ?>
                <?php elseif (in_array($column->dbType, $this->booleanTypes)): ?>
                <?= "<?= CHtml::encode(\$data->{$columnName} == 1 ? 'True' : 'False') ?>\n" ?>
                <?php elseif (in_array(strtolower($columnName), $this->emailFields)): ?>
                <?= "<?= CHtml::mailto(\$data->{$columnName}) ?>\n" ?>
                <?php elseif (in_array($column->dbType, array('longtext'))): ?>
                <?= "<?= nl2br(\$data->{$columnName}) ?>\n" ?>
                <?php elseif (in_array(strtolower($columnName), $this->imageFields)): ?>
                <?= "<img alt=\"<?= \$data->{$identificationColumn} ?>\" title=\"<?= \$data->{$identificationColumn} ?>\" src=\"<?= \$data->{$columnName} ?>\" />\n" ?>
                <?php elseif (in_array(strtolower($columnName), $this->urlFields)) : ?>
                <?= "<?= AweHtml::formatUrl(\$data->{$columnName}, true) ?>\n" ?>
                <?php else : ?>
                <?= "<?= CHtml::encode(\$data->{$columnName}) ?>\n" ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!in_array($column->dbType, $this->booleanTypes)): ?>
            <?= "<?php endif; ?>\n" ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>