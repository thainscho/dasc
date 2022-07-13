<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Institutions Model
 *
 * @property \App\Model\Table\ReceiversTable&\Cake\ORM\Association\HasMany $Receivers
 * @property \App\Model\Table\SendersTable&\Cake\ORM\Association\HasMany $Senders
 *
 * @method \App\Model\Entity\Institution newEmptyEntity()
 * @method \App\Model\Entity\Institution newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Institution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Institution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Institution findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Institution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Institution[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Institution|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institution saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Institution[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Institution[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Institution[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Institution[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstitutionsTable extends Table
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

        $this->setTable('institutions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Receivers', [
            'foreignKey' => 'institution_id',
        ]);
        $this->hasMany('Senders', [
            'foreignKey' => 'institution_id',
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
            ->maxLength('name', 255);

        $validator
            ->scalar('dbpedia_url')
            ->maxLength('dbpedia_url', 255)
            ->allowEmptyString('dbpedia_url');

        return $validator;
    }
}
