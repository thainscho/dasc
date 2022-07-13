<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Letterformats Model
 *
 * @property \App\Model\Table\LettersTable&\Cake\ORM\Association\HasMany $Letters
 *
 * @method \App\Model\Entity\Letterformat newEmptyEntity()
 * @method \App\Model\Entity\Letterformat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Letterformat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Letterformat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Letterformat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Letterformat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Letterformat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Letterformat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Letterformat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Letterformat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letterformat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letterformat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letterformat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LetterformatsTable extends Table
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

        $this->setTable('letterformats');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Letters', [
            'foreignKey' => 'letterformat_id',
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
            ->scalar('description')
            ->notEmptyString('description');

        return $validator;
    }
}
