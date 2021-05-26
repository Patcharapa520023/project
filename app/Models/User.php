<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rolse',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function personnel(){
        return $this->HasOne(Personnel::class);
    }
    public static function joinpersonnel(){
        return self::leftJoin('personnels','users.id','=','personnels.user_id')
        ->select('users.id as ไอดี','users.rolse as บทบาท','users.email as อีเมล์','users.password as รหัสผ่าน','personnels.title as คำนำหน้า','personnels.name as ชื่อ','personnels.lastname as นามสกุล','personnels.address as ที่อยู่','personnels.telnum as เบอร์โทรศัพท์')
        ->get()
        ->toArray();
    }
}
