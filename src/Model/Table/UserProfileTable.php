<?php

declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserProfile Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserProfile newEmptyEntity()
 * @method \App\Model\Entity\UserProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserProfileTable extends Table
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

        $this->setTable('user_profile');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
        // $validator
        //     ->integer('id')
        //     ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 25,__('length must be less than 25'))
            ->minLength('first_name', 2,__('length must be greater than 2'))
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name', __('Please Enter First Name'))
           
                //'message' => 'Generic error message used when `false` is returned';
            ;
            $validator
            ->scalar('last_name')
            ->maxLength('last_name', 25,__('length must be less than 25'))
            ->minLength('last_name', 2,__('length must be greater than 2'))
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name', __('Please Enter First Name'))
           
                //'message' => 'Generic error message used when `false` is returned';
            ;

       
     

        $validator
            ->scalar('contact')

            ->requirePresence('contact', 'create')
            ->notEmptyString('contact', __('Conatct must not empty'))
            ->maxLength('contact', 12, __('Contact number nmust be lenth of 10 to 12'))
            ->numeric('contact',__('only numeric value is allowed'));

        $validator
            ->scalar('address')
            ->maxLength('address', 150, __('Adderess lenth must be under 150'))
            ->minLength('address', 10, __('Adderess lenth must be greater than 10'))

            ->requirePresence('address', 'create')
            ->notEmptyString('address');

            // $validator
            // ->allowEmpty('profile_image')
            // ->add('profile_image', [
            //     'uploadError' => [
            //         'rule' => 'uploadError',
            //         'message' => 'The cover image upload failed.',
            //         'allowEmpty' => TRUE,
            //     ],
    
            //     'mimeType' => [
            //         'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
            //         'message' => 'Please only upload images (gif, png, jpg).',
            //         'allowEmpty' => TRUE,
            //     ],
            //     'fileSize' => [
            //         'rule' => array('fileSize', '<=', '1MB'),
            //         'message' => 'Cover image must be less than 1MB.',
            //         'allowEmpty' => TRUE,
            //     ],
            // ])
            // ;

    
        $validator
        ->scalar('profile_image',__('Please select image '))
        ->add('profile_image', [
            'uploadError' => [
                'rule' => 'uploadError',
                'message' => 'The cover image upload failed.',
                'allowEmpty' => TRUE,
            ],

            'mimeType' => [
                'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                'message' => 'Please only upload images (gif, png, jpg).',
                'allowEmpty' => TRUE,
            ],
            'fileSize' => [
                'rule' => array('fileSize', '<=', '1MB'),
                'message' => 'Cover image must be less than 1MB.',
                'allowEmpty' => TRUE,
            ],
        ]);
        


        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->notEmptyDateTime('modified_date');

//  $validator->add('profile_image', 'custom', [
//             'rule' => function ($value) {
//                 // dd($value);
//                 if (empty($value)) {
//                     return "Please Upload Profile image ";
//                 } 

//                 // if ($value < 3) {
//                 //     return 'Error message when value is less than 10';
//                 // }

//                 // if ($value > 20) {
//                 //     return 'Error message when value is greater than 20';
//                 // }
//                 return true;
//             },
//             //'message' => 'Generic error message used when `false` is returned';
//         ]);





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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
