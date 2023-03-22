<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pages;

class PageController extends Controller
{

    # For view page
    public function view($slug) {
        $page = Pages::whereSlug($slug)->firstOrFail();

        return view('page', compact('page'));
    }

    # For remove page

    public function remove(Request $request){
        # For validate
        $request->validate([
            'id' => 'required|integer|exists:App\Models\Pages',
        ]);

        try {
            Pages::find($request->id)->delete();

            return response()->json(['success' => true, 'message' => 'Страница успешно добавлена'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    # For changes to save in page

    public function change(Request $request){
        # For validate
        $request->validate([
            'id' => 'required|integer|exists:App\Models\Pages',
            'title' => 'required|string',
            'content' => 'required|string',
            'ceotitle' => 'required|string',
            'ceodescription' => 'required|string',
        ]);

        try {
            Pages::find($request->id)->update([
                'title' => $request->title,
                // 'slug' => $this->translit($request->title, 'lat'),
                'content' => $request['content'],
                'ceotitle' => $request['ceotitle'],
                'ceodescription' => $request['ceodescription'],
            ]);

            return response()->json(['success' => true, 'message' => 'Страница успешно добавлена'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    # For detail of page

    public function detail($id){
        $page = Pages::whereId($id)->firstOrFail();

        return view('detailpage', compact('page'));
    }

    # For listing all pages

    public function list(){
        $pages = Pages::all();

        return view('list', compact('pages'));
    }

    # For addition new page
    public function createpage(Request $request){
        # For validate
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'ceotitle' => 'required|string',
            'ceodescription' => 'required|string',
        ]);

        try {
            Pages::create([
                'title' => $request->title,
                'slug' => $this->translit($request->title, 'lat'),
                'content' => $request['content'],
                'ceotitle' => $request['ceotitle'],
                'ceodescription' => $request['ceodescription'],
            ]);

            return response()->json(['success' => true, 'message' => 'Страница успешно добавлена'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }


    # For traslit name
    public function translit($text, $lang) {
        $cyr = [
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
        ];
        $lat = [
            'a','b','v','g','d','e','e','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','shch','','y','','e','yu','ya',
            'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
            'R','S','T','U','F','H','Ts','Ch','Sh','Shch','','Y','','e','Yu','Ya'
        ];
        if($lang=="cyr") {
            //Если с латиницы на кириллицу
            $text = str_replace($lat, $cyr, $text);
        } else {
            //Если с кириллицы на латиницу
            $text = str_replace($cyr, $lat, $text);
        }
        $text = preg_replace('/\s+/', ' ', $text);
        $text = strtolower($text);
        $text = preg_replace("/[^a-z0-9\s]+/", '', $text); 
        $array = preg_split('/\s+/', $text);
        $array = array_filter($array, function($item) {
            return trim($item) !== "";
        });
        $array = array_unique($array);
        $text = implode('-', $array);
        return $text;
    }

}
