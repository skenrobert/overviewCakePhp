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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $libro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Libros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="libros form content">


            <?= $this->Form->create($libro, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Libro') ?></legend>
                <?php  echo $this->Form->control('nombre');  ?>
                <?php
                    echo $this->Form->control('imagen', ['type'=>'file', 'required'=>false]);
                ?>
                <?= $this->Html->image('libros/'.$libro->imagen, array('width'=>100)) ?>

            
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>


        </div>
    </div>
</div>
