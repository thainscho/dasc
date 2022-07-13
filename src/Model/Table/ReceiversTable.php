<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Receivers Model
 *
 * @property \App\Model\Table\LettersTable&\Cake\ORM\Association\BelongsTo $Letters
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\InstitutionsTable&\Cake\ORM\Association\BelongsTo $Institutions
 *
 * @method \App\Model\Entity\Receiver newEmptyEntity()
 * @method \App\Model\Entity\Receiver newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Receiver[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Receiver get($primaryKey, $options = [])
 * @method \App\Model\Entity\Receiver findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Receiver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Receiver[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Receiver|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Receiver saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Receiver[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Receiver[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Receiver[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Receiver[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ReceiversTable extends Table
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

        $this->setTable('receivers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Letters', [
            'foreignKey' => 'letter_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
        ]);
        $this->hasMany('Annotations', [
            'foreignKey' => 'receiver_id',
        ]);
        $this->hasMany('Signatures', [
            'foreignKey' => 'receiver_id',
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
            ->integer('letter_id')
            ->requirePresence('letter_id', 'create')
            ->notEmptyString('letter_id');

        $validator
            ->integer('person_id')
            ->allowEmptyString('person_id');

        $validator
            ->integer('institution_id')
            ->allowEmptyString('institution_id');

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
        $rules->add($rules->existsIn('letter_id', 'Letters'), ['errorField' => 'letter_id']);
        $rules->add($rules->existsIn('person_id', 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn('institution_id', 'Institutions'), ['errorField' => 'institution_id']);

        return $rules;
    }
}
