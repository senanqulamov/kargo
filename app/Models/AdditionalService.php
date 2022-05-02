<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
    use HasFactory;

    public function getTypeAttribute(){
        switch ($this->status) {
            case '1':
                return 'DESI';
                break;

            case '2':
                return 'BOX';
                break;
            
            default:
                return 'PRODUCT';
                break;
        }
    }
}
