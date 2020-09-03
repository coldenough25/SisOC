<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciasTipo[]|\Cake\Collection\CollectionInterface $ocorrenciasTipos
 */
?>
<div class="ocorrenciasTipos index content">
    <?= $this->Html->link(__('New Ocorrencias Tipo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ocorrencias Tipos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th><?= $this->Paginator->sort('setor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ocorrenciasTipos as $ocorrenciasTipo): ?>
                <tr>
                    <td><?= $this->Number->format($ocorrenciasTipo->id) ?></td>
                    <td><?= h($ocorrenciasTipo->nome) ?></td>
                    <td><?= h($ocorrenciasTipo->descricao) ?></td>
                    <td><?= $ocorrenciasTipo->has('setor') ? $this->Html->link($ocorrenciasTipo->setor->id, ['controller' => 'Setors', 'action' => 'view', $ocorrenciasTipo->setor->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ocorrenciasTipo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ocorrenciasTipo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ocorrenciasTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciasTipo->id)]) ?>
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
