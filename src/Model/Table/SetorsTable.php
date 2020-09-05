<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Setors Model
 *
 * @property \App\Model\Table\OcorrenciasTiposTable&\Cake\ORM\Association\HasMany $OcorrenciasTipos
 *
 * @method \App\Model\Entity\Setor newEmptyEntity()
 * @method \App\Model\Entity\Setor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Setor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Setor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SetorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('setors');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('OcorrenciasTipos', [
            'foreignKey' => 'setor_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('sigla')
            ->maxLength('sigla', 16)
            ->requirePresence('sigla', 'create')
            ->notEmptyString('sigla');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        return $validator;
    }
}
