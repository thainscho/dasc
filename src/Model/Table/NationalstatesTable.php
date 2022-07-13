<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nationalstates Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 *
 * @method \App\Model\Entity\Nationalstate newEmptyEntity()
 * @method \App\Model\Entity\Nationalstate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Nationalstate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nationalstate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nationalstate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Nationalstate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nationalstate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nationalstate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nationalstate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nationalstate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationalstate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationalstate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nationalstate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NationalstatesTable extends Table
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

        $this->setTable('nationalstates');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Addresses', [
            'foreignKey' => 'nationalstate_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');
        
		$validator
            ->scalar('abbreviation')
            ->maxLength('abbreviation', 10)
            ->requirePresence('name', 'create')
            ->notEmptyString('abbreviation');

        $validator
            ->scalar('dbpedia_url')
            ->maxLength('dbpedia_url', 255)
            ->requirePresence('dbpedia_url', 'create')
            ->notEmptyString('dbpedia_url');

        return $validator;
    }
    
    
    
}
