<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @property \App\Model\Table\PropertyCategoriesTable&\Cake\ORM\Association\BelongsTo $PropertyCategories
 * @property \App\Model\Table\PropertyCommentsTable&\Cake\ORM\Association\HasMany $PropertyComments
 *
 * @method \App\Model\Entity\Property newEmptyEntity()
 * @method \App\Model\Entity\Property newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Property[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property get($primaryKey, $options = [])
 * @method \App\Model\Entity\Property findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Property[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PropertiesTable extends Table
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

        $this->setTable('properties');
        $this->setDisplayField('category_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('PropertyCategories', [
            'foreignKey' => 'property_categories_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PropertyComments', [
            'foreignKey' => 'property_id',
        ]);
        $this->hasMany('ApoLinks',
        ['foreignKey'=>'properties_id']);
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
            ->scalar('property_title')
            ->maxLength('property_title', 35,__('Enter Title'))
            ->requirePresence('property_title', 'create')
            ->notAlphaNumeric('property_title')
            ->notEmptyString('property_title');
        $validator
            ->scalar('property_description')
            ->maxLength('property_description', 255)
            ->requirePresence('property_description', 'create')
            ->notEmptyString('property_description');

        $validator
            ->scalar('property_image')
           ->requirePresence('property_image', 'create')
           ->add('property_image',[
            'mimetype'=>[
                'rule'=>['mimetype',['image/jpg','image/png','image/jpeg']],
                'message'=>'Please upload only jpg/jpeg and png.',
            ],
            'filesize'=>[
                'rule'=>['filesize','<=','1MB'],
                'message'=>'image file size must be less than 1MB.',
            
            ],
            ]);
       

        $validator
            ->scalar('property_tags')
            ->maxLength('property_tags', 255)   
            ->requirePresence('property_tags', 'create')
            ->notAlphaNumeric('property_tags')
            ->notEmptyString('property_tags');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->notEmptyDateTime('modified_date');

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
        $rules->add($rules->existsIn('property_categories_id', 'PropertyCategories'), ['errorField' => 'property_categories_id']);

        return $rules;
    }
}

