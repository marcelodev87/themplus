<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Churchs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_foundation',
        'document',
        'leader',

        //address
        'zipcode',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement'
    ];

    public function leaderId()
    {
        return $this->hasOne(User::class, 'id', 'leader');
    }

    // DOCUMENT --------------------------------------------------
    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = $this->clearField($value);
    }

    public function getDocumentAttribute($value)
    {
        return substr($value, 0, 2) . '.' . substr($value, 2, 3) . '.' . substr($value, 5, 3) . '/' . substr($value, 8, 4) . '-' . substr($value, 12, 2);
    }

    // DATE OF FOUNDATION -----------------------------------------
    public function setDateOfFoundationAttribute($value)
    {
        $this->attributes['date_of_foundation'] = $this->convertStringToDate($value);
    }

    public function getDateOfFoundationAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
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
