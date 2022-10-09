<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $connection = 'history';
    protected $table = 'twinmoti_history.logs';

//    public function getValueAttribute($value)
//    {
//        return json_decode($value);
//    }

    public function add(){
        $this->value = $this->value+1;
        $this->save();
    }

    public function clear($name){
        $users = Log::where([['for','admin'],['name',$name]])->first();
        if ($users==null) return null;
        $users->value = 0;
        $users->save();
        return $users;
    }

    public function getAdminLog(){
        $users = Log::where([['for','admin'],['name','users']])->first()->value;
        $invoice = Log::where([['for','admin'],['name','invoice']])->first()->value;
        $surveys = Log::where([['for','admin'],['name','surveys']])->first()->value;
        $review = Log::where([['for','admin'],['name','review']])->first()->value;
        $contact = Log::where([['for','admin'],['name','contact']])->first()->value;
        $emails = Log::where([['for','admin'],['name','emails']])->first()->value;
        return [$users,$invoice,$surveys,$review,$contact,$emails];
    }
}
