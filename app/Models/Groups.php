<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'situation',
        'date_of_foundation',
        'leader',

        //days
        'frequency',
        'time',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'host',
        'location',

        //address
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city'
    ];

    //=============================================== RELATIONSHIPS ======================================
    public function hostId()
    {
        return $this->belongsTo(User::class, 'host', 'id');
    }

    public function groupsLeaderId()
    {
        return $this->belongsTo(User::class, 'leader', 'id');
    }
// ======================= aqui
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }
    //=============================================== RELATIONSHIPS ======================================
    public function toArray()
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'leader' => $this->groupsLeaderId->name,
        'host' => $this->hostId->name,

        'frequency' => ($this->frequency == '7' ? 'Semanal' :($this->frequency == "15" ? "Quinzenal" : 'Mensal')),
        'time' => $this->time,
        'sunday' => ($this->sunday == '1' ? '| Domingo |' : ''),
        'monday' => ($this->monday == '1' ? '| Segunda-Feira |' : ''),
        'tuesday' => ($this->tuesday == '1' ? '| Terça-Feria |' : ''),
        'wednesday' => ($this->wednesday == '1' ? '| Quarta-Feira |' : ''),
        'thursday' => ($this->thursday == '1' ? '| Quinta-Feira |' : ''),
        'friday' => ($this->friday == '1' ? '| Sexta-Feira |' : ''),
        'saturday' => ($this->saturday == '1' ? '| Sábado |' : ''),
        'location' => ($this->location == "public" ? "Local Público" : ($this->location == "church" ? "Igreja" :  ($this->location == "house" ? "Casa" : "Faculdade"))),

        'zipcode' => $this->zipcode,
        'street' => $this->street,
        'number' => $this->number,
        'complement' => $this->complement,
        'neighborhood' => $this->neighborhood,
        'state' => $this->state,
        'city' => $this->city
    ];
}

    // ====================================== GET SITUATION ===================================
    public function getSituationAttribute($value)
    {
        if($value == '1'){
            return "Ativo";
        }
        if($value == '0'){
            return "Inativo";
        }
    }


    //============================================== DATE OF FOUNDATION ==============================
    public function setDateOfFoundationAttribute($value)
    {
        $this->attributes['date_of_foundation'] = $this->convertStringToDate($value);
    }

    public function getDateOfFoundationAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    // ========================================== TIME ===========================
    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = $this->convertStringToTime($value);
    }

    public function getTimeAttribute($value)
    {
        return date('h:i', strtotime($value));
    }

    private function convertStringToTime(?string $param)
    {
        if(empty($param)){
            return null;
        }
        list($hour,$minutes) = explode(':', $param);
        return (new DateTime($hour . ':' . $minutes))->format('H:i:s');
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
