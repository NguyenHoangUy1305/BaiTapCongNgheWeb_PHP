<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bantin extends Model
{
    protected $table = 'bantin';
    protected $fillable = ['tieude', 'tomtat', 'noidung', 'hinhanh', 'chuthichanh', 'nguoidang', 'chude_id'];
}