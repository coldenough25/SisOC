<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ocorrencia Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int|null $dominio
 * @property int $criador
 * @property string $alvo
 * @property \Cake\I18n\FrozenTime $data_hora
 * @property string $situacao
 * @property int $ocorrencias_tipo_id
 *
 * @property \App\Model\Entity\OcorrenciasTipo $ocorrencias_tipo
 */
class Ocorrencia extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'descricao' => true,
        'dominio' => true,
        'criador' => true,
        'alvo' => true,
        'data_hora' => true,
        'situacao' => true,
        'ocorrencias_tipo_id' => true,
        'ocorrencias_tipo' => true,
    ];
}
