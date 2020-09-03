<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor $setor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Setors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="setors form content">
            <?= $this->Form->create($setor) ?>
            <fieldset>
                <legend><?= __('Add Setor') ?></legend>
                <?php
                    echo $this->Form->control('sigla');
                    echo $this->Form->control('nome');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
