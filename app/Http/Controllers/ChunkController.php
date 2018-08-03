<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sticker;

class ChunkController extends Controller
{
    public function getIndex()
    {
        // ini_set('memory_limit', '-1');
        Sticker::whereNotNull('title')->whereNull('title_th')->whereNull('title_en')->chunk(500, function ($stickers) {

            foreach ($stickers as $row) {
                //echo var_dump(json_decode($row->title));
                @$title = json_decode($row->title);
                // echo $title->{'th'};

                $row->update([
                    'title_th' => @$title->{'th'},
                    'title_en' => @$title->{'en'}
                ]);
            }

            echo "success<br>";
            // exit();
        });
    }
}


// User::where('approved', 0)->chunk(100, function ($users) {
//     foreach ($users as $user) {
//         $user->update(['approved' => 1]);
//     }
// });
  
