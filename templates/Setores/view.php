<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setore $setore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Setore'), ['action' => 'edit', $setore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Setore'), ['action' => 'delete', $setore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Setores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Setore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="setores view content">
            <h3><?= h($setore->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sigla') ?></th>
                    <td><?= h($setore->sigla) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($setore->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($setore->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($setore->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
