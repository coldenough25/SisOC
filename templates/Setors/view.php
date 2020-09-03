<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor $setor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Setor'), ['action' => 'edit', $setor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Setor'), ['action' => 'delete', $setor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Setors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Setor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="setors view content">
            <h3><?= h($setor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sigla') ?></th>
                    <td><?= h($setor->sigla) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($setor->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($setor->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($setor->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ocorrencias Tipos') ?></h4>
                <?php if (!empty($setor->ocorrencias_tipos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Setor Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($setor->ocorrencias_tipos as $ocorrenciasTipos) : ?>
                        <tr>
                            <td><?= h($ocorrenciasTipos->id) ?></td>
                            <td><?= h($ocorrenciasTipos->nome) ?></td>
                            <td><?= h($ocorrenciasTipos->descricao) ?></td>
                            <td><?= h($ocorrenciasTipos->setor_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OcorrenciasTipos', 'action' => 'view', $ocorrenciasTipos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OcorrenciasTipos', 'action' => 'edit', $ocorrenciasTipos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OcorrenciasTipos', 'action' => 'delete', $ocorrenciasTipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciasTipos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
