<?php

namespace App\Http\Controllers;

use App\Models\PostMeta;
use App\Models\Redirect;
use App\Models\TermRelationship;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
// use \App\GxLibs\GxSchema;
use Vedmant\LaravelShortcodes\Facades\Shortcodes;
use Illuminate\Support\Facades\Auth;
// use Google\Service\Webmasters\SearchAnalyticsQueryRequest;
// use Google_Client;
// use Google_Service_Webmasters;
// use Google_Service_Gmail;
use Carbon\Carbon;

class PostController extends Controller
{
    public function List($post_type, Request $request)
    {
        $posts = Post::where('post_type', $post_type)->where('post_status', isset($_GET['status']) ? $_GET['status'] : []);
        if(isset($_GET['category_ID'])){
            $posts = $posts->whereRaw('ID IN (SELECT `post_ID` FROM `gx_term_relationships` WHERE `term_ID` = ?)', [$_GET['category_ID']]);
        }
        return view('admin.posts.list', ['post_type' => $post_type, 'request' => $request, 'posts' => $posts->get()]);
    }

    public function Add($post_type, Request $request)
    {
        if ($request->isMethod('post')) {
            $post = $this->Store($request);
            return redirect('admin/posts/edit/' . $post->ID);
        }
        return view('admin.posts.add',[
            'edit'      => false,
            'title'     => 'Add New Post',
            'post_type' => $post_type
        ]);
    }

    /**
     * Edit user
     *
     * @return \Illuminate\View\View
     */
    public function Edit($ID, Request $request)
    {
        if ($request->isMethod('post')) {
            $post = $this->Store($request);
            return redirect('admin/posts/edit/' . $post->ID);
        }
        $post   = Post::find($ID);
        /*
        $client = new Google_Client();
    
        $client->setAuthConfig(base_path('config/json/gx-erp-service-account-caa707ad6cd0.json'));
        $client->addScope([Google_Service_Webmasters::WEBMASTERS_READONLY, Google_Service_Gmail::GMAIL_READONLY]);
        $client->setAccessType('offline');
        $client->setPrompt('select_account');
        $service                = new Google_Service_Webmasters($client);
        $siteUrl                = 'https://www.tripsinegypt.com/';
        $startDate              = Carbon::now()->subMonths(3)->format('Y-m-d');
        $endDate                = Carbon::now()->format('Y-m-d');
        $searchConsoleRequest   = new SearchAnalyticsQueryRequest();
        $searchConsoleRequest->setStartDate($startDate);
        $searchConsoleRequest->setEndDate($endDate);
        $searchConsoleRequest->setDimensionFilterGroups([
            [
                'filters' => [
                    ['dimension' => 'page', 'operator' => 'equals', 'expression' => $post->url()]
                ]
            ]
        ]);
        $searchConsoleRequest->setDimensions(['country']);
        $searchConsole['Countries']         = $service->searchanalytics->query($siteUrl, $searchConsoleRequest);
        $country_codes                      = collect(config('countries-alpha3'));
        foreach($searchConsole['Countries'] as $r){
            $r->country                     = isset($country_codes[$r->getKeys()[0]]) ? $country_codes[$r->getKeys()[0]] : $r->getKeys()[0];
        }

        $searchConsoleRequest->setDimensions(['device']);
        $searchConsole['Devices']           = $service->searchanalytics->query($siteUrl, $searchConsoleRequest);

        $searchConsoleRequest->setDimensions(['query']);
        $searchConsole['Queries']           = $service->searchanalytics->query($siteUrl, $searchConsoleRequest);
        */

        //'', 'query'
        //return response()->json($searchConsole);
        return view('admin.posts.add',[
            'edit'                  => true,
            'post'                  => $post,
            'title'                 => 'Edit Post',
        ]);
    }
    public function UpdateAttractions(Request $request)
    {
        $attractions = [];
        $arrayKeys = [7255 => "Karnak", 7256 => "Khan", 7257 => "Egyptian", 7258 => "Synagogue", 7259 => "Catadcombs", 7260 => "Red", 7261 => "Bent", 7262 => "Philae", 7263 => "King Ramses II Temple", 7264 => "Memphis", 7265 => "Giza", 7266 => "Luxor", 7267 => "Hatshepsut", 7268 => "Unfinished", 7270 => "Mina", 7271 => "Marine", 7272 => "Mary", 7273 => "Aquarium", 7274 => "Saqqara", 7275 => "Morsi", 7276 => "Qaitbay", 7279 => "Valley Temple", 7280 => "Colossi", 7281 => "Pillar", 7282 => "High", 7283 => "Nefertari", 7284 => "White", 7285 => "Black", 7286 => "Dakhla", 7287 => "Kharga", 7288 => "Barise", 7289 => "Kings", 7290 => "Rifai", 7291 => "Tulun", 7292 => "Library", 7293 => "Salah", 7294 => "Amun", 7295 => "Mut", 7296 => "Montu", 7297 => "Amenhotep IV", 7298 => "Pylon of", 7299 => "Obelisks", 7300 => "Court of", 7301 => "Colonnade", 7302 => "Amenhotep III", 7303 => "Avenue", 7304 => "Dendera", 7305 => "Abydos", 7306 => "Edfu", 7307 => "Kom Ombo", 7308 => "Abu Simbel", 7310 => "Catacombs", 7311 => "Amr", 7312 => "Mohamed Ali", 7314 => "Rashid Museum", 7315 => "House of Amasyali", 7317 => "Nubian Village", 7320 => "El Alamein Museum", 7321 => "Cemetery", 7322 => "Sphinx", 7325 => "Sultan", 7329 => "Queens", 7330 => "Habu", 7331 => "Deir El-Medina", 7332 => "Egyptian Civilization", 7334 => "The Hanging Church"];
        foreach(Post::where('post_type', 'tour')->get() as $post){
            if(!empty($highlights = PostMeta::getMeta($post->ID, 'highlights'))){
                foreach($arrayKeys as $k => $v){
                    if (strpos($highlights, $v) !== false) {
                        //$TermRel            = new TermRelationship();
                        //$TermRel->post_ID   = $post->ID;
                        //$TermRel->term_ID   = $k;
                        //$TermRel->save();
                    }
                }
            }
        }
        return view('admin.posts.update-attractions',[
            'title'     => 'Edit Post'
        ]);
    }

    /**
     * Delete user
     *
     * @return \Illuminate\View\View
     */
    public function PermanentlyRemove($ID)
    {
        Post::find($ID)->delete();
        return back()->withInput();
    }
    // public function MarkAsReviewed($ID)
    // {
    //     Post::find($ID)->update(['is_reviewed' => 1]);
    //     return back()->withInput();
    // }

    public function Trash($ID)
    {
        Post::find($ID)->update(['post_status' => 'trash']);
        return back()->withInput();
    }





    public function Store(Request $request)
    {
        if ($request->isMethod('post')) {
            if(isset($request->post['ID'])){
                $post               = Post::find($request->post['ID']);
            }else{
                $post               = new Post();
                $post->post_type    = $request->post['post_type'];
            }
            $post->post_title       = $request->post['post_title'];
            $post->post_content     = $request->post['post_content'];
            $post->post_slug        = !empty($request->post['post_slug']) ? $request->post['post_slug'] : '';
            $post->post_parent      = !empty($request->post['post_parent']) ? $request->post['post_parent'] : 0;
            $post->post_status      = $request->post['post_status'];
            $post->post_image       = $request->post['post_image'];
            $post->save();

            if(isset($request->meta) && is_array($request->meta)){
                foreach($request->meta as $meta_key => $meta_value){
                    PostMeta::where('meta_key', $meta_key)->where('post_ID', $post->ID)->delete();
                    if(!empty($meta_value)){
                        $PostMeta               = new PostMeta();
                        $PostMeta->post_ID      = $post->ID;
                        $PostMeta->meta_key     = $meta_key;
                        $PostMeta->meta_value   = is_array($meta_value) ? json_encode($meta_value) : $meta_value;
                        $PostMeta->save();
                    }
                }
            }

            if(isset($request->terms) && is_array($request->terms)){
                TermRelationship::where('post_ID', $post->ID)->delete();
                foreach($request->terms as $termID){
                    $TermRel            = new TermRelationship();
                    $TermRel->post_ID   = $post->ID;
                    $TermRel->term_ID   = $termID;
                    $TermRel->save();
                }
            }
            return $post;
        }
        return view('admin.posts.add');
    }



    public function View($slug, Request $request){
        if(isset($_GET['zzzzzzzzzzz'])){
            $array = array();
            $posts = Post::where('post_type', 'page')->where('post_parent', 0)->where('post_status', 'publish')->get();
            foreach($posts as $post){
                if(Post::where('post_type', 'page')->where('post_parent', $post->ID)->where('post_status', 'publish')->count() == 0){
                    $array[]    = ['ID' => $post->ID, 'post_title' => $post->post_title, 'children' => $post->Children()];
                }
            }
            dd(json_encode($array));
        }
        if(str_ends_with($request->getPathInfo(), '/') && !str_ends_with($slug, '/')){
            $slug .= '/';
        }

        if(isset($_GET['zizo'])){
            dd(implode(',', Post::where('post_type', 'post')->pluck('ID')->toArray()));
        }
        //$slug = substr($request->getPathInfo(), 1);

        $redirect = Redirect::where('from', $slug)->first();
        if($redirect){
            return redirect(url($redirect->to));
        }

        if (Auth::check()) {
            $post = Post::where('post_slug', $slug)->get()->first();
        }else{
            $post = Post::where('post_slug', $slug)->where('post_status', 'publish')->get()->first();
        }
        if($post){
            if(str_ends_with($request->getPathInfo(), '//')){
                return redirect($post->Url());
            }
            if($post->ID == \App\Models\Option::get('homepage')){
                return \redirect(url('/'));
            }
            // if($post->ID == \App\Models\Option::get('search_page')){
            //     return (new SearchController())->view($request);
            // }
            
            if($request->isMethod('post') && isset($request->comment)){
                dd($this->SaveComment($post, $request));
                return back()->withInput();
            }
            $template = $post->meta('template');
            if($template){
                return Shortcodes::render(view('templates.' . $template, ['post' => $post])->render());
                // return Shortcodes::render(view('templates.' . $template, ['post' => $post, 'schema' => new GxSchema()])->render());
            }else{
                return Shortcodes::render(view('single-' . $post->post_type, ['post' => $post])->render());
                // return Shortcodes::render(view('single-' . $post->post_type, ['post' => $post, 'schema' => new GxSchema()])->render());
            }
        }else{
          	if(str_ends_with($slug, '/') && $new_post = Post::where('post_slug', substr($slug, 0, -1))->first()){
            	return redirect($new_post->Url());
            }
          	if(!str_ends_with($slug, '/') && $new_post = Post::where('post_slug', $slug . '/')->first()){
            	return redirect($new_post->Url());
            }
            return view('error');
        }
        return Shortcodes::render(view('single-' . $post->post_type, ['post' => $post]));
        // return Shortcodes::render(view('single-' . $post->post_type, ['post' => $post, 'schema' => new GxSchema()])->render());
    }
    
}
