<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public function getTypeAttribute(){
        switch ($this->worktime) {
            case 'fulltime':
                return 'Full Time';
                break;

            case 'parttime':
                return 'Part Time';
                break;

            case 'remote':
                return 'Remote';
                break;
            
            default:
                return 'Internship';
                break;
        }
    }

    public function getCareerCountry(){
        return $this->hasOne(Country::class, 'id', 'location');
    }
}
