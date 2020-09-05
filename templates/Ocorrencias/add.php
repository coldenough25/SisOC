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
            <?= $this->Html->link(__('List Ocorrencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ocorrencias form content">
            <?= $this->Form->create($ocorrencia) ?>
            <fieldset>
                <legend><?= __('Registrar Ocorrência') ?></legend>
                <?php
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('criador');
                    echo $this->Form->control('alvo');
                    echo $this->Form->control('data_hora');
                    echo $this->Form->control('situacao');
                    echo $this->Form->control('ocorrencias_tipo_id', ['options' => $ocorrenciasTipos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
