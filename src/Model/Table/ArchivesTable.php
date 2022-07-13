<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Archives Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\ManifestationsTable&\Cake\ORM\Association\HasMany $Manifestations
 *
 * @method \App\Model\Entity\Archive newEmptyEntity()
 * @method \App\Model\Entity\Archive newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Archive[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Archive get($primaryKey, $options = [])
 * @method \App\Model\Entity\Archive findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Archive patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Archive[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Archive|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Archive saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Archive[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Archive[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Archive[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Archive[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ArchivesTable extends Table
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

        $this->setTable('archives');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
        ]);
        $this->hasMany('Manifestations', [
            'foreignKey' => 'archive_id',
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
            ->allowEmptyString('name');

        $validator
            ->integer('address_id')
            ->allowEmptyString('address_id');

        $validator
            ->scalar('website')
            ->maxLength('website', 255)
            ->allowEmptyString('website');

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
        $rules->add($rules->existsIn('address_id', 'Addresses'), ['errorField' => 'address_id']);

        return $rules;
    }
}
