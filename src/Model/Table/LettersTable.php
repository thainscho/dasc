<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Letters Model
 *
 * @property \App\Model\Table\LetterformatsTable&\Cake\ORM\Association\BelongsTo $Letterformats
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\AttachmentsTable&\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\ManifestationsTable&\Cake\ORM\Association\HasMany $Manifestations
 * @property \App\Model\Table\ReceiversTable&\Cake\ORM\Association\HasMany $Receivers
 * @property \App\Model\Table\SendersTable&\Cake\ORM\Association\HasMany $Senders
 *
 * @method \App\Model\Entity\Letter newEmptyEntity()
 * @method \App\Model\Entity\Letter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Letter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Letter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Letter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Letter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Letter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Letter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Letter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Letter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Letter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LettersTable extends Table
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

        $this->setTable('letters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Letterformats', [
            'foreignKey' => 'letterformat_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AddressFrom', [
        	'className' => 'Addresses',
            'foreignKey' => 'address_from_id',
        ]);
        $this->belongsTo('AddressTo', [
        	'className' => 'Addresses',
            'foreignKey' => 'address_to_id',
        ]);
        $this->hasMany('Aliases', [
            'foreignKey' => 'letter_id',
        ]);
        $this->hasMany('Attachments', [
            'foreignKey' => 'letter_id',
        ]);
        $this->hasMany('Manifestations', [
            'foreignKey' => 'letter_id',
        ]);
        $this->hasMany('Receivers', [
            'foreignKey' => 'letter_id',
        ]);
        $this->hasMany('Senders', [
            'foreignKey' => 'letter_id',
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
            ->allowEmptyString('letterdate_day');

        $validator
            ->allowEmptyString('letterdate_month');

        $validator
            ->scalar('letterdate_year')
            ->allowEmptyString('letterdate_year');

        $validator
            ->allowEmptyString('datemin_day');

        $validator
            ->allowEmptyString('datemin_month');

        $validator
            ->scalar('datemin_year')
            ->allowEmptyString('datemin_year');

        $validator
            ->allowEmptyString('letterdatecorrected_day');

        $validator
            ->allowEmptyString('letterdatecorrected_month');

        $validator
            ->scalar('letterdatecorrected_year')
            ->allowEmptyString('letterdatecorrected_year');

        $validator
            ->allowEmptyString('datemax_day');

        $validator
            ->allowEmptyString('datemax_month');

        $validator
            ->scalar('datemax_year')
            ->allowEmptyString('datemax_year');

        $validator
            ->integer('letterformat_id')
            ->requirePresence('letterformat_id', 'create')
            ->notEmptyString('letterformat_id');

        $validator
            ->integer('address_from_id')
            ->allowEmptyString('address_from_id');

        $validator
            ->allowEmptyString('address_from_assumed');

        $validator
            ->integer('address_to_id')
            ->allowEmptyString('address_to_id');

        $validator
            ->allowEmptyString('address_to_assumed');

        $validator
            ->scalar('note')
            ->allowEmptyString('note');

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
        $rules->add($rules->existsIn('letterformat_id', 'Letterformats'), ['errorField' => 'letterformat_id']);
        //TODO: diese Regeln kontrollieren
		//$rules->add($rules->existsIn('address_from_id', 'Addresses'), ['errorField' => 'address_from_id']);
        //$rules->add($rules->existsIn('address_to_id', 'Addresses'), ['errorField' => 'address_to_id']);

        return $rules;
    }
}
