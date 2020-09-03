<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTipo[]|\Cake\Collection\CollectionInterface $usuariosTipos
 */
?>
<div class="usuariosTipos index content">
    <?= $this->Html->link(__('New Usuarios Tipo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios Tipos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('descricao') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuariosTipos as $usuariosTipo): ?>
                <tr>
                    <td><?= $this->Number->format($usuariosTipo->id) ?></td>
                    <td><?= h($usuariosTipo->nome) ?></td>
                    <td><?= h($usuariosTipo->descricao) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuariosTipo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuariosTipo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuariosTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosTipo->id)]) ?>
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
