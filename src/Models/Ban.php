<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{

    protected  $table = 'ban';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'ip',
        'mac',
        'user_id',
        'ban_deleted_at',
    ];
    public function user()
    {
        return $this->hasOne(config('helpers.ban.user_model'), config('helpers.ban.user_model_primary_key_id'));
    }

    public function ipBan($ip,$banTime)
    {
        self::create([
            'ip'=>$ip,
            'ban_deleted_at'=>$banTime
        ]);
    }

    public function userBan($userId,$banTime)
    {
        self::create([
            'userId'=>$userId,
            'ban_deleted_at'=>$banTime
        ]);
    }

    public function macBan($mac,$banTime)
    {
        self::create([
            'mac'=>$mac,
            'ban_deleted_at'=>$banTime
        ]);
    }
}
