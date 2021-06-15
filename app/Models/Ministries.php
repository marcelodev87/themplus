<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User;

class Ministries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_foundation',
        'leader',
        'situation'
    ];

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'date_of_foundation' => 'required|date_format:d/m/Y',
            'leader' => 'required',
            'situation' => 'required'
        ];
    }


    //RELATIONSHIPS
    public function leaderId()
    {
        return $this->belongsTo(User::class, 'leader', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'ministries_users', 'ministries_id', 'user_id');
    }

    // DATE OF FOUNDATION -----------------------------------------
    public function setDateOfFoundationAttribute($value)
    {
        //App\Models\Ministries::convertStringToDate()
        $this->attributes['date_of_foundation'] = $this->convertStringToDate($value);
    }

    public function getDateOfFoundationAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // DATE OF UPDATE -----------------------------------------
    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y - H:m:s', strtotime($value));
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

    private function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }
        list($day,$month,$year) = explode('/', $param);
        return (new DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}
