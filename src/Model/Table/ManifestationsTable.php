<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Manifestations Model
 *
 * @property \App\Model\Table\LettersTable&\Cake\ORM\Association\BelongsTo $Letters
 * @property \App\Model\Table\ArchivesTable&\Cake\ORM\Association\BelongsTo $Archives
 * @property \App\Model\Table\AnnotationsTable&\Cake\ORM\Association\HasMany $Annotations
 * @property \App\Model\Table\SignaturesTable&\Cake\ORM\Association\HasMany $Signatures
 * @property \App\Model\Table\LanguagesTable&\Cake\ORM\Association\BelongsToMany $Languages
 *
 * @method \App\Model\Entity\Manifestation newEmptyEntity()
 * @method \App\Model\Entity\Manifestation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Manifestation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manifestation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manifestation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Manifestation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manifestation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manifestation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manifestation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manifestation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manifestation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manifestation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Manifestation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManifestationsTable extends Table
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

        $this->setTable('manifestations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Letters', [
            'foreignKey' => 'letter_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Archives', [
            'foreignKey' => 'archive_id',
        ]);
        $this->hasMany('Annotations', [
            'foreignKey' => 'manifestation_id',
        ]);
        $this->hasMany('Signatures', [
            'foreignKey' => 'manifestation_id',
        ]);
        $this->belongsToMany('Languages', [
            'foreignKey' => 'manifestation_id',
            'targetForeignKey' => 'language_id',
            'joinTable' => 'languages_manifestations',
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
            ->allowEmptyString('pages');

        $validator
            ->allowEmptyString('includingEnvelope');

        $validator
            ->allowEmptyString('draft');

        $validator
            ->allowEmptyString('isSent');

        $validator
            ->scalar('writingstyle')
            ->allowEmptyString('writingstyle');

        $validator
            ->scalar('writingstyle_other')
            ->maxLength('writingstyle_other', 255)
            ->allowEmptyString('writingstyle_other');

        $validator
            ->integer('archive_id')
            ->allowEmptyString('archive_id');

        $validator
            ->scalar('archive_info')
            ->maxLength('archive_info', 255)
            ->allowEmptyString('archive_info');

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
        $rules->add($rules->existsIn('archive_id', 'Archives'), ['errorField' => 'archive_id']);

        return $rules;
    }
}
