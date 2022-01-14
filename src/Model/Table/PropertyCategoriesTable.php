<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropertyCategories Model
 *
 * @method \App\Model\Entity\PropertyCategory newEmptyEntity()
 * @method \App\Model\Entity\PropertyCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PropertyCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PropertyCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PropertyCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PropertyCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PropertyCategoriesTable extends Table
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

        $this->setTable('property_categories');
        $this->setDisplayField('category_name');
        $this->setPrimaryKey('id');
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
            ->scalar('category_name')
            ->maxLength('category_name', 20,__('lenth must be less than 20'))
            ->requirePresence('category_name', 'create')
            ->notEmptyString('category_name',__('Please enter category'))
          ->notAlphaNumeric('category_name',__('Please enter chracters only'))
            ->minLength('category_name',2,__('lenth must be greater than 2'));
        // $validator
        //     ->scalar('status')
        //     ->requirePresence('status', 'create')
        //     ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->notEmptyDateTime('modified_date');

        return $validator;
    }
}
