<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escalation extends Model
{
    protected $table = 'escalations';

    protected $fillable = ['query_type_id','user_id','mail_to','mail_cc'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function query_type()
    {
        return $this->belongsTo(QueryType::class);
    }
}
