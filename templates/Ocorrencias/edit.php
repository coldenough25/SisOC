<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ocorrencia $ocorrencia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ocorrencia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencia->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ocorrencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ocorrencias form content">
            <?= $this->Form->create($ocorrencia) ?>
            <fieldset>
                <legend><?= __('Edit Ocorrencia') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('dominio');
                    echo $this->Form->control('criador');
                    echo $this->Form->control('alvo');
                    echo $this->Form->control('data_hora');
                    echo $this->Form->control('situacao');
                    echo $this->Form->control('ocorrencias_tipo_id', ['options' => $ocorrenciasTipos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
