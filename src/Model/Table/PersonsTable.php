<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persons Model
 *
 * @property \App\Model\Table\ReceiversTable&\Cake\ORM\Association\HasMany $Receivers
 * @property \App\Model\Table\SendersTable&\Cake\ORM\Association\HasMany $Senders
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonsTable extends Table
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

        $this->setTable('persons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Aliases', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Receivers', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Senders', [
            'foreignKey' => 'person_id',
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
            ->scalar('dbpedia_url')
            ->maxLength('dbpedia_url', 255)
            ->allowEmptyString('dbpedia_url');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 255)
            ->allowEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->allowEmptyString('lastname');

        $validator
            ->scalar('gender')
            ->allowEmptyString('gender');

        $validator
            ->allowEmptyString('dayofbirth');

        $validator
            ->allowEmptyString('monthofbirth');

        $validator
            ->scalar('yearofbirth')
            ->allowEmptyString('yearofbirth');

        $validator
            ->scalar('yearofbirthUpper')
            ->allowEmptyString('yearofbirthUpper');

        $validator
            ->allowEmptyString('monthofdeath');

        $validator
            ->allowEmptyString('dayofdeath');

        $validator
            ->scalar('yearofdeath')
            ->allowEmptyString('yearofdeath');

        $validator
            ->scalar('yearofdeathUpper')
            ->allowEmptyString('yearofdeathUpper');

        $validator
            ->scalar('note')
            ->allowEmptyString('note');

        return $validator;
    }
}
