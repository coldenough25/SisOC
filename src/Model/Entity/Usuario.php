<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $ra_siape
 * @property string $email
 * @property string $senha
 * @property int $usuarios_tipo_id
 *
 * @property \App\Model\Entity\UsuariosTipo $usuarios_tipo
 */
class Usuario extends Entity
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
        'nome' => true,
        'ra_siape' => true,
        'senha' => true,
        'email' => true,
        'usuarios_tipo_id' => true,
        'usuarios_tipo' => true,
    ];

    protected $_hidden = [
        'senha'
    ];

    protected function _setSenha(string $senha) : ?string {
        if (strlen($senha) > 0) {
            return (new DefaultPasswordHasher())->hash($senha);
        }
    }
}
