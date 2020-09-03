<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciasTipo $ocorrenciasTipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ocorrenciasTipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciasTipo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ocorrencias Tipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ocorrenciasTipos form content">
            <?= $this->Form->create($ocorrenciasTipo) ?>
            <fieldset>
                <legend><?= __('Edit Ocorrencias Tipo') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('setor_id', ['options' => $setors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
