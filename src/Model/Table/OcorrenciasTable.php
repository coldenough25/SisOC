<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ocorrencias Model
 *
 * @property \App\Model\Table\OcorrenciasTiposTable&\Cake\ORM\Association\BelongsTo $OcorrenciasTipos
 *
 * @method \App\Model\Entity\Ocorrencia newEmptyEntity()
 * @method \App\Model\Entity\Ocorrencia newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ocorrencia findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ocorrencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ocorrencia|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ocorrencia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ocorrencia[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ocorrencia[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ocorrencia[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ocorrencia[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OcorrenciasTable extends Table
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

        $this->setTable('ocorrencias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('OcorrenciasTipos', [
            'foreignKey' => 'ocorrencias_tipo_id',
            'joinType' => 'INNER',
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->integer('dominio')
            ->allowEmptyString('dominio');

        $validator
            ->integer('criador')
            ->requirePresence('criador', 'create')
            ->notEmptyString('criador');

        $validator
            ->scalar('alvo')
            ->maxLength('alvo', 255)
            ->requirePresence('alvo', 'create')
            ->notEmptyString('alvo');

        $validator
            ->dateTime('data_hora')
            ->requirePresence('data_hora', 'create')
            ->notEmptyDateTime('data_hora');

        $validator
            ->scalar('situacao')
            ->maxLength('situacao', 255)
            ->requirePresence('situacao', 'create')
            ->notEmptyString('situacao');

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
        $rules->add($rules->existsIn(['ocorrencias_tipo_id'], 'OcorrenciasTipos'), ['errorField' => 'ocorrencias_tipo_id']);

        return $rules;
    }
}
