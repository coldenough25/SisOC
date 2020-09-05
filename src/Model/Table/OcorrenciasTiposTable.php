<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OcorrenciasTipos Model
 *
 * @property \App\Model\Table\SetorsTable&\Cake\ORM\Association\BelongsTo $Setors
 * @property \App\Model\Table\OcorrenciasTable&\Cake\ORM\Association\HasMany $Ocorrencias
 *
 * @method \App\Model\Entity\OcorrenciasTipo newEmptyEntity()
 * @method \App\Model\Entity\OcorrenciasTipo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OcorrenciasTipo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OcorrenciasTiposTable extends Table
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

        $this->setTable('ocorrencias_tipos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Setors', [
            'foreignKey' => 'setor_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ocorrencias', [
            'foreignKey' => 'ocorrencias_tipo_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['setor_id'], 'Setors'), ['errorField' => 'setor_id']);

        return $rules;
    }
}
