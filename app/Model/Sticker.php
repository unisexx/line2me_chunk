<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    protected $guarded = []; // ถ้าเป็นแบบนี้แสดงว่าบันทึกลงทุกช่อง เพราะไม่ได้ ignore ฟิลด์ไหนเลย
}
