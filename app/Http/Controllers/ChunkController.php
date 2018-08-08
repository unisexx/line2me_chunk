<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sticker;

class ChunkController extends Controller
{
    public function getIndex()
    {
        // set_time_limit(0);
        Sticker::select('id','title')->where('status','approve')->whereNotNull('title')->whereNull('updated_at')->orderBy('id','asc')->chunk(50, function ($stickers) {

            foreach ($stickers as $row) {
                // echo var_dump(json_decode($row->title));
                @$title = @json_decode($row->title);
                // var_dump($title);
                
                $row->update([
                    'title_en' => @$title ? @$title->{'en'} : '',
                    'title_th' => @$title ? @$title->{'th'} ? @$title->{'th'} : @$title->{'en'} : ''
                ]);

                // echo "success<br>";

                // echo 'ไอดี = '.$row->id.' <br>';
                // echo $row->title.' <br>';
                // echo 'ชื่อไทย = '.@$title->{'th'}.'<br>';
                // echo 'ชื่ออังกิด = '.@$title->{'en'}.'<br>---------------------------<br>';
                // echo $row->id.', ';
            }
            // echo $row->id.', ';
            // exit();
        });
    }
}


// User::where('approved', 0)->chunk(100, function ($users) {
//     foreach ($users as $user) {
//         $user->update(['approved' => 1]);
//     }
// });
  
