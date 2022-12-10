<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Libros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="libros form content">

            <?= $this->Form->create($libro, ['type'=>'file']) ?>

            <fieldset>
                <legend><?= __('Add Libro') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('imagen', ['type'=>'file']);
                ?>
            </fieldset>

            <?= $this->Form->button(__('Submit')) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
