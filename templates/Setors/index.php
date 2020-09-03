<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor[]|\Cake\Collection\CollectionInterface $setors
 */
?>
<div class="setors index content">
    <?= $this->Html->link(__('New Setor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Setors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sigla') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($setors as $setor): ?>
                <tr>
                    <td><?= $this->Number->format($setor->id) ?></td>
                    <td><?= h($setor->sigla) ?></td>
                    <td><?= h($setor->nome) ?></td>
                    <td><?= h($setor->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $setor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id)]) ?>
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
