<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Signatures Model
 *
 * @property \App\Model\Table\ManifestationsTable&\Cake\ORM\Association\BelongsTo $Manifestations
 * @property \App\Model\Table\SendersTable&\Cake\ORM\Association\BelongsTo $Senders
 *
 * @method \App\Model\Entity\Signature newEmptyEntity()
 * @method \App\Model\Entity\Signature newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Signature[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Signature get($primaryKey, $options = [])
 * @method \App\Model\Entity\Signature findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Signature patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Signature[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Signature|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Signature saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Signature[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SignaturesTable extends Table
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

        $this->setTable('signatures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Manifestations', [
            'foreignKey' => 'manifestation_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Senders', [
            'foreignKey' => 'sender_id',
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
            ->integer('manifestation_id')
            ->requirePresence('manifestation_id', 'create')
            ->notEmptyString('manifestation_id');

        $validator
            ->integer('sender_id')
            ->allowEmptyString('sender_id');

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
        $rules->add($rules->existsIn('manifestation_id', 'Manifestations'), ['errorField' => 'manifestation_id']);
        $rules->add($rules->existsIn('sender_id', 'Senders'), ['errorField' => 'sender_id']);

        return $rules;
    }
}
