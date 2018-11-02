<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey='subject';
    // TODO: Someone should document what the primary key is all about here.
    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

     public const GROUP_TYPE_0_TEXT = 'Group Not Set';
     public const GROUP_TYPE_1_TEXT = 'Group 1 - No intervention';
     public const GROUP_TYPE_2_TEXT = 'Group 2 - Reminders';
     public const GROUP_TYPE_3_TEXT = 'Group 3 - Remindres and Virtual Visits';

     protected $group_type_lookup = array(
       0 => self::GROUP_TYPE_0_TEXT,
       1 => self::GROUP_TYPE_1_TEXT,
       2 => self::GROUP_TYPE_2_TEXT,
       3 => self::GROUP_TYPE_3_TEXT,
     );
    protected $fillable = [
        'subject',
        'user_id',
        'pin',
        'disease_state',
        'virtualvisit',
        'enrollmentdate',
        'group_type',
    ];


    protected $hidden = ['registration_token','access_token','refresh_token','expires','pin'];

    public $incrementing = false;

    public function actionplans()
    {
        return $this->hasMany(Actionplan::class,'subject','subject');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class,'subject','subject');
    }

    public function medicationslots()
    {
        return $this->hasMany(Medicationslot::class,'subject','subject');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class,'subject','subject');
    }


    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function bloodpressures()
    {
        return $this->hasMany(Bloodpressure::class);
    }

    public function bloodglucoses()
    {
        return $this->hasMany(Bloodglucose::class);
    }

    public function pulseoxygens()
    {
        return $this->hasMany(Pulseoxygen::class);
    }

    public function enrollsubject()
    {
        return $this->hasOne(Enrollsubject::class,'userid','userid');
    }

    public function getGroupTypeName() {
        return $this->group_type_lookup[$this->group_type];
    }

}
