<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    public function Search(Request $request){
        $media = Media::limit(100)->orderBy('ID', 'desc');
        if(isset($request->search) && !empty($request->search)){
            $media->where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('alt', 'LIKE', '%'.$request->search.'%')
            ->orWhere('caption', 'LIKE', '%'.$request->search.'%')
            ->orWhere('description', 'LIKE', '%'.$request->search.'%');
        }
        if(isset($request->dimensions) && !empty($request->dimensions)){
            $media->where('dimensions', $request->dimensions);
        }
        return $media->get();
        return [];
    }
    public function Slugify($text)
    {
        // Strip html tags
        $text=strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) { return 'n-a'; }
        // Return result
        return $text;
    }

    public function Upload(Request $request){
        if($request->files){
            $response   = collect();
            $files      = $request->file('files');
            foreach ($files as $file) {
                $date       = date('Y') . '/' . date('m');
                $fileName   = $this->Slugify(pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $fileName   = str_replace(' ', '-', $fileName);

                if(!is_dir(public_path('assets/uploads/' .$date))){
                    mkdir(public_path('assets/uploads/' .$date), 0777, true);
                }
                $i = 1;
                while (file_exists(public_path('assets/uploads/' .$date . '/' . $fileName))) {
                    $fileName = pathinfo($fileName,PATHINFO_FILENAME) . '-' . $i . '.' . pathinfo($fileName,PATHINFO_EXTENSION);
                    $i++;
                }
                $file->move(public_path('assets/uploads/' .$date), $fileName);
                $Media                  = new Media();
                $Media->name            = $date . '/' . $fileName;
                $Media->alt             = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $Media->caption         = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $Media->description     = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $Media->save();
                
                $img                    = Image::make(public_path('assets/uploads/' .$Media->name));
                if($img){
                    $width              = $img->width();
                    $height             = $img->height();
                    $Media->dimensions  = $width . 'x' . $height;
                    $Media->save();
                }
                $Media->url             = $Media->Url();
                $response->push($Media);
            }
            return response()->json($response);
        }
    }

    public function Update(Request $request){
        $media                  = Media::find($request->media['ID']);
        $media->alt             = $request->media['alt'];
        $media->caption         = $request->media['caption'];
        $media->save();
        return response()->json($media);
    }
    public function Delete($ID, Request $request){
        if(isset($_GET['update'])){
            foreach (Media::whereRaw('dimensions IS NULL AND name !="2023/01/33-gettyimages-154260931-216706f.jpg"')->orderBy('ID', 'desc')->get() as $media){
                $img                = Image::make(public_path('assets/uploads/' .$media->name));
                if($img){
                    $width              = $img->width();
                    $height             = $img->height();
                    $media->dimensions  = $width . 'x' . $height;
                    $media->save();
                }
            }
            dd('s');
        }
        $media                  = Media::find($ID);
        unlink(public_path('assets/uploads/' .$media->name));
        $media->delete();
        return response()->json($media);
    }

}
