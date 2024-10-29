<?php 

namespace  App\file ;

use App\Models\User;
use Carbon\Carbon ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\select;

class Visitor {

    public static function getOnlineUser() {

        $online_users =
         DB::table('sessions')
         ->distinct()
         ->select(['users.id' ,'users.first_name' ,'users.last_name' ,'users.email' ])
        ->whereNotNull("user_id")
        ->where('last_activity' , '>' ,  Carbon::now()->subMinutes(5)->getTimestamp())
        ->leftJoin('users' , 'sessions.user_id','=' , 'users.id')
        ->get() ;


        $online_users = $online_users->mapWithKeys(function ($online_user) {
            return [$online_user->id => $online_user];
        });
        return $online_users ; 
    }

    public static  function isOnline (User $user) {
        return 
        DB::table('sessions')
       ->where('user_id' , '=' , $user->id)
       ->Where('last_activity' , '>' ,  Carbon::now()->subMinutes(5)->getTimestamp())
       ->get() ;
   }

   public  static function myTimeZone($timestamp){

    $date = Carbon::createFromTimestamp($timestamp);
    $dateInGmt3 = $date->setTimezone('GMT+3')->format('Y-m-d H:i:s');
    return $dateInGmt3  ;
   }

   public static function isDeviecAllowed() {

       
        $devices =   static::allowedDevice(Auth::user())  ; 
            
           
            foreach ($devices->toArray() as $device ) {
                
                if ($device->device == request()->userAgent()  ){
                     return true  ; 
                }
            }

        return false  ;

    }

    public static function blockeOtherSession() {
  
            DB::table('sessions')
            ->where("user_id" , "=" , Auth::user()->id)
            ->delete() ;
            
    }


    public static function allowedDevice (User $user ){

        $devices = DB::table("allowed_devices")
        ->where('user_id', '=' ,$user->id  )
        ->get() ; 

        return $devices ;

    }

    public function DisernsCoulmenName( string $table , array $except=null )
    {
        $columnNames = Schema::getColumnListing($table) ; 
        if ($except != null ) {
            $columnNames  =  array_diff( $columnNames , $except);
        }
        $raw_select  = "";

        foreach ($columnNames as   $columnName) {
            $raw_select = $raw_select .
                $table . "." . $columnName . "  " . "as" . "  " . $table . "_" . $columnName .",";
        }

       return (substr($raw_select, 0, -1));
    }

   
    




}