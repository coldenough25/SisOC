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
            <?= $this->Html->link(__('Edit Ocorrencias Tipo'), ['action' => 'edit', $ocorrenciasTipo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ocorrencias Tipo'), ['action' => 'delete', $ocorrenciasTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciasTipo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ocorrencias Tipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ocorrencias Tipo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ocorrenciasTipos view content">
            <h3><?= h($ocorrenciasTipo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($ocorrenciasTipo->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descricao') ?></th>
                    <td><?= h($ocorrenciasTipo->descricao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Setor') ?></th>
                    <td><?= $ocorrenciasTipo->has('setor') ? $this->Html->link($ocorrenciasTipo->setor->id, ['controller' => 'Setors', 'action' => 'view', $ocorrenciasTipo->setor->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ocorrenciasTipo->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ocorrencias') ?></h4>
                <?php if (!empty($ocorrenciasTipo->ocorrencias)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Dominio') ?></th>
                            <th><?= __('Criador') ?></th>
                            <th><?= __('Alvo') ?></th>
                            <th><?= __('Data Hora') ?></th>
                            <th><?= __('Situacao') ?></th>
                            <th><?= __('Ocorrencias Tipo Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ocorrenciasTipo->ocorrencias as $ocorrencias) : ?>
                        <tr>
                            <td><?= h($ocorrencias->id) ?></td>
                            <td><?= h($ocorrencias->descricao) ?></td>
                            <td><?= h($ocorrencias->dominio) ?></td>
                            <td><?= h($ocorrencias->criador) ?></td>
                            <td><?= h($ocorrencias->alvo) ?></td>
                            <td><?= h($ocorrencias->data_hora) ?></td>
                            <td><?= h($ocorrencias->situacao) ?></td>
                            <td><?= h($ocorrencias->ocorrencias_tipo_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ocorrencias', 'action' => 'view', $ocorrencias->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ocorrencias', 'action' => 'edit', $ocorrencias->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ocorrencias', 'action' => 'delete', $ocorrencias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencias->id)]) ?>
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
