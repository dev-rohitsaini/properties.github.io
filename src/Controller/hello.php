<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class PropertiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        /*$this->belongsTo('Blogs', [
            'foreignKey' => 'blog_id',                                                                                                                                                                                                                                                                                                                                                                                                       
            'joinType' => 'INNER',
        ]);*/
        $this->hasMany('PropertyTagLink', [
            'foreignKey' => 'property_id',
            
        ]);

        
    }

    public function get_properties()
    {
        $result=$this->find('All')->contain(['PropertyTagLink'=>function($q){return $q->select(['property_id','tag_id','PropertyTagLink.status'])->where(['PropertyTagLink.status'=>'1']);},'PropertyTagLink.Tags'])->where(['status'=>'1'])->order(['created_date'=>'DESC'])->toList();
        return $result;
    }

}


