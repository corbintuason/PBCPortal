<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Material;
class MaterialList extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "material_lists";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'material_id', 'mbd_schedule_id', 'quantity'
     ];
 
     public function mbd_schedule(){
         return $this->belongsTo(MBDSchedule::class);
     }

     public function material(){
         return $this->belongsTo(Material::class);
     }
}
