<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTipo $usuariosTipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuariosTipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosTipo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usuarios Tipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usuariosTipos form content">
            <?= $this->Form->create($usuariosTipo) ?>
            <fieldset>
                <legend><?= __('Edit Usuarios Tipo') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
