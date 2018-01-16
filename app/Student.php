<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/1/4
 * Time: 10:08
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    const STATUS_PASS = 1;
    const STATUS_FAIL = 0;
    const STATUS_UN = -1;

    protected $table = 'students';
    protected $fillable = ['name', 'idcard_number','phone','admit_status'];

    protected function getDateFormat(){
        return time();
    }

    public function getAdmitStatus($status = null){
        $arr = [
            self::STATUS_UN =>"未知",
            self::STATUS_FAIL =>"未通过",
            self::STATUS_PASS =>"通过"
        ];
        if($status !== null){
            return array_key_exists($status, $arr) ? $arr[$status] : $arr[self::STATUS_UN];
        }
        return $arr;
    }
}