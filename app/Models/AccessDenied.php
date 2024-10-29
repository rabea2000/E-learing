<?php

namespace App\Models;

use DeviceDetector\DeviceDetector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Karmendra\LaravelAgentDetector\AgentDetector;
class AccessDenied extends Model
{
    use HasFactory;
    protected $table = "access_denied" ;

    
    
    public function getDeviceInfoAttribute(){

       $detect = new  AgentDetector($this->device);
       return  $detect->device() 
              ."  ". $detect->deviceBrand()
              ."  ".  $detect->deviceModel()
              ."  " . $detect->platform()   
             ."  " . $detect->browser() ;
      
      
        
    }


    public function user()  {
        return $this->belongsTo(User::class) ; 
    }
    


    // protected function casts(): array
    // {
    //     return [
    //         'created_at' => 'datetime'
    //     ];
    // }
}
