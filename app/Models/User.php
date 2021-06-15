<?php

namespace App\Models;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //protected $table = "ministries_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        //'password',

        //Docs
        'date_of_birth',
        'document',
        'document_secondary',
        'document_secondary_complement',

        //contact
        'cell',
        'telephone',
        'telephone_commercial',

        //Type
        'register_type',
        'member_situation',
        'cover',

        //Info
        'genre',
        'civil_status',
        'place_of_birth',
        'schooling',
        'occupation',

        //Ministry
        'church',
        'date_of_baptism',
        'date_of_register',
        'reason_of_register',
        'previous_church',
        'date_of_exit',
        'reason_of_exit',
        'destiny_church'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //=============================================== RELATIONSHIPS ======================================
    public function address()
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

     public function groups()
    {
        return $this->hasMany(Groups::class);
    }/*
     public function leaderGroups()
    {
        return $this->hasMany(Groups::class,'leader','id');
    } */
// ======================= aqui

    public function ministries()
    {
        return $this->belongsToMany(Ministries::class,'ministries_users', 'user_id', 'ministries_id');
    }


    //=============================================== RELATIONSHIPS ======================================


    // INPUTS AND OUTPUTS

    // DOCUMENT --------------------------------------------------
    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = $this->clearField($value);
    }

    public function getDocumentAttribute($value)
    {
        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9, 2);
    }

    // DATE OF BIRTH -----------------------------------------
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $this->convertStringToDate($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // DATE OF BAPTISM -----------------------------------------
    public function setDateOfBaptismAttribute($value)
    {
        $this->attributes['date_of_baptism'] = $this->convertStringToDate($value);
    }

    public function getDateOfBaptismAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // DATE OF REGISTER -----------------------------------------
    public function setDateOfRegisterAttribute($value)
    {
        $this->attributes['date_of_register'] = $this->convertStringToDate($value);
    }

    public function getDateOfRegisterAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // DATE OF EXIT -----------------------------------------
    public function setDateOfExitAttribute($value)
    {
        $this->attributes['date_of_exit'] = $this->convertStringToDate($value);
    }

    public function getDateOfExitAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // CONTACTS
    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = $this->clearField($value);
    }

    public function getTelephoneAttribute($value)
    {
        return '('. substr($value, 0, 2) . ')' . substr($value, 2, 5) . '-' . substr($value, 7, 4);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = $this->clearField($value);
    }

    public function getCellAttribute($value)
    {
        return '('. substr($value, 0, 2) . ')' . substr($value, 2, 5) . '-' . substr($value, 7, 4);
    }


    //GENRE
    public function getGenreAttribute($value)
    {
        if($value == 'male'){
            return "Masculino";
        }
        if($value == 'female'){
            return "Feminino";
        }
    }

    // GET SITUATION
    public function getSituationAttribute($value)
    {
        if($value == '1'){
            return "Ativo";
        }
        if($value == '0'){
            return "Inativo";
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }



    public function clearField(?string $param)
    {
        if(empty($param)){
            return '';
        }
        return str_replace(['.','-','/','(',')',' '], '', $param);
    }


    private function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }
        list($day,$month,$year) = explode('/', $param);
        return (new DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}
