<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ApoLinksTable extends Table
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

        $this->setTable('apo_links');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Appointments', [
            'foreignKey' => 'appointment_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'properties_id',
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
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->requirePresence('modified_date', 'create')
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
        $rules->add($rules->existsIn('appointment_id', 'Appointments'), ['errorField' => 'appointment_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('properties_id', 'Properties'), ['errorField' => 'properties_id']);

        return $rules;
    }   
    public function get_properties()
    {
        $result=$this->find('All')->contain(['Appointments','Users','Properties','Users.UserProfile'])->toList();

           //returning exytra function =>function($q){return $q->Select(['Users.UserProfile.first_Name',]); }


        return $result;
    }
    public function get_results($aid=null)
    {
     
        $result=$this->find('All')->where(['user_id'=>$aid])->contain(['Appointments','Users','Properties'])->toList();

           //returning exytra function =>function($q){return $q->Select(['Users.UserProfile.first_Name',]); }


        return $result;
    }
    
    public function saveIds($uid,$pid,$aid)
    {
        $apolinks = $this->newEmptyEntity();
         $apolinks->user_id=$uid ;
        $apolinks->properties_id=$pid ;
        $apolinks->appointment_id=$aid ;
       
        $ret =$this->save($apolinks);
return $ret;
        
        
}


}
