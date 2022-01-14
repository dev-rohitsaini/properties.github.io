<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\PropertyCommentsTable&\Cake\ORM\Association\HasMany $PropertyComments
 * @property \App\Model\Table\UserProfileTable&\Cake\ORM\Association\HasMany $UserProfile
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('PropertyComments', [
            'dependent'=>true,
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('UserProfile', [
            'dependent'=>true,
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ApoLinks',
        ['foreignKey'=>'user_id']);
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
            ->email('email',true,__('Please Enter a valid email'))
            ->requirePresence('email', 'create')
            ->notEmptyString('email',__('Enter email'))
            ->add(
                'email', 
            ['unique' => [
                    'rule' => 'validateUnique', 
                    'provider' => 'table', 
                    'message' => 'Email already Existed']
                     
            ]);

            // if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
           
            
        

        $validator
            ->scalar('password')
            ->maxLength('password', 60,__('length must be less than 60'))
            ->requirePresence('password', 'create',__('please enter password'))
            ->notEmptyString('password',__('Enter Password'));
            

            $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 60,__('password length must be less than 60 '))
            ->minLength('confirm_password', 2,__('password length must be less than 2 '))
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password',__('Enter Confirm password'))
            ->sameAs('confirm_password','password',__('Enter Confirm password same as Password'));
            

            
        //     $validator

        // ->scalar('user_profile.profile_image',__('Please select image '))
        // ->notEmptyString('user_profile.profile_image',('hello'))
        // ->requirePresence('user_profile.profile_image','create',__('Please upload image'))
        // ->add('user_profile.profile_image', [
        //     'mimetype' => [
        //         'rule' => ['mimetype', ['image/jpg', 'image/png', 'image/jpeg']],
        //         'message' => 'only jpg/jpeg and png  formats are supported.',
        //     ],
        //     'filesize' => [
        //         'rule' => ['filesize', '<=', '1MB'],
        //         'message' => 'image size must be less than 1MB.',

        //     ],
        // ]);
              

            
        // $validator
        //     ->scalar('user_type')
        //     ->notEmptyString('user_type');

        // $validator
        //     ->scalar('status')
        //     ->notEmptyString('status');

   
        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->notEmptyDateTime('modified_date');



        // $validator
        //     ->dateTime('created_date')
        //     ->notEmptyDateTime('created_date');

        // $validator
        //     ->dateTime('modified_date')
        //     ->notEmptyDateTime('modified_date');

        // $validator
        //     ->integer('tokan')
        //     ->allowEmptyString('tokan');

        // $validator
        //     ->integer('trend')
        //     ->requirePresence('trend', 'create')
        //     ->notEmptyString('trend');

        // $validator
        //     ->scalar('hash_tag')
        //     ->maxLength('hash_tag', 100)
        //     ->requirePresence('hash_tag', 'create')
        //     ->notEmptyString('hash_tag');

        // $validator
        //     ->decimal('mention')
        //     ->requirePresence('mention', 'create')
        //     ->notEmptyString('mention');

       
       
        
    //    dd('hello');
        // $validator->add('password', 'custom', [
        //     'rule' => function ($value, $context) {
        //         if (empty($value)) {
        //             return "password cannot be empty";
        //         }
        //         // if ($value < 8) {
        //         //     return 'Error message when value is less than 10';
        //         // }

        //         // if ($value > 30) {
        //         //     return 'Error message when value is greater than 20';
        //         // }
        //         return true;
        //     },
            //'message' => 'Generic error message used when `false` is returned';
    
        

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
