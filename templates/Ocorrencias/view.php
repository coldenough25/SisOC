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
            <?= $this->Html->link(__('Edit Ocorrencia'), ['action' => 'edit', $ocorrencia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ocorrencia'), ['action' => 'delete', $ocorrencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ocorrencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ocorrencia'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ocorrencias view content">
            <h3><?= h($ocorrencia->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Alvo') ?></th>
                    <td><?= h($ocorrencia->alvo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Situacao') ?></th>
                    <td><?= h($ocorrencia->situacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ocorrencias Tipo') ?></th>
                    <td><?= $ocorrencia->has('ocorrencias_tipo') ? $this->Html->link($ocorrencia->ocorrencias_tipo->id, ['controller' => 'OcorrenciasTipos', 'action' => 'view', $ocorrencia->ocorrencias_tipo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ocorrencia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dominio') ?></th>
                    <td><?= $this->Number->format($ocorrencia->dominio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criador') ?></th>
                    <td><?= $this->Number->format($ocorrencia->criador) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Hora') ?></th>
                    <td><?= h($ocorrencia->data_hora) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($ocorrencia->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
