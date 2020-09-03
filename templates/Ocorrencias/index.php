<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ocorrencia[]|\Cake\Collection\CollectionInterface $ocorrencias
 */
?>
<div class="ocorrencias index content">
    <?= $this->Html->link(__('New Ocorrencia'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ocorrencias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dominio') ?></th>
                    <th><?= $this->Paginator->sort('criador') ?></th>
                    <th><?= $this->Paginator->sort('alvo') ?></th>
                    <th><?= $this->Paginator->sort('data_hora') ?></th>
                    <th><?= $this->Paginator->sort('situacao') ?></th>
                    <th><?= $this->Paginator->sort('ocorrencias_tipo_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ocorrencias as $ocorrencia): ?>
                <tr>
                    <td><?= $this->Number->format($ocorrencia->id) ?></td>
                    <td><?= $this->Number->format($ocorrencia->dominio) ?></td>
                    <td><?= $this->Number->format($ocorrencia->criador) ?></td>
                    <td><?= h($ocorrencia->alvo) ?></td>
                    <td><?= h($ocorrencia->data_hora) ?></td>
                    <td><?= h($ocorrencia->situacao) ?></td>
                    <td><?= $ocorrencia->has('ocorrencias_tipo') ? $this->Html->link($ocorrencia->ocorrencias_tipo->id, ['controller' => 'OcorrenciasTipos', 'action' => 'view', $ocorrencia->ocorrencias_tipo->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ocorrencia->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ocorrencia->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ocorrencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencia->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
