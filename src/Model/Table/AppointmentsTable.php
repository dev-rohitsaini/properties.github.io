<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;


class AppointmentsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('appointments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ApoLinks', [
            'foreignKey' => 'appointment_id',
        ]);
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->time('slot')
            ->requirePresence('slot', 'create')
            ->notEmptyTime('slot');

        $validator
            ->scalar('process')
            ->notEmptyString('process');

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
}
