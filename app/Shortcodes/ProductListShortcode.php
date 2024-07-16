<?php

namespace App\Shortcodes;

use App\Models\Post;
use App\Models\Term;
use App\Models\TermRelationship;
use Vedmant\LaravelShortcodes\Shortcode;

class ProductListShortcode extends Shortcode
{
    /**
     * @var string Shortcode description
     */
    public $description = 'Post List';

    /**
     * @var array Shortcode attributes with default values
     */
    public $attributes = [
        'ids'               => [
            'default'       => '',
            'description'   => 'Posts IDs',
            'sample'        => '1,232,423',
        ],
        'category'          => [
            'default'       => '',
            'description'   => 'Posts Category',
            'sample'        => '1,232,423',
        ],
        'limit'             => [
            'default'       => 10,
            'description'   => 'Posts Number',
            'sample'        => '10',
        ],
        'items_per_row'     => [
            'default'       => 3,
            'description'   => 'items per row',
            'sample'        => '3',
        ],

    ];

    /**
     * Render shortcode
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        $atts       = $this->atts();
        $shared     = $this->shared();

        $IDS        = [];
        if(!empty($atts['category'])){
            $categories     = Term::whereIn('slug', explode(',', $atts['category']))->pluck('ID')->toArray();
            // dd($categories);
            if(count($categories) == 0){
                $categories = Term::whereIn('ID', explode(',', $atts['category']))->pluck('ID')->toArray();
            }
            $IDS = array_merge($IDS, TermRelationship::whereIn('term_ID', $categories)->pluck('post_ID')->toArray());
        }
        // if(!empty($atts['category'])){
        //     $categories     = Term::whereIn('slug', explode(',', $atts['category']))->pluck('ID')->toArray();
        //     if(count($categories) == 0){
        //         $categories = Term::whereIn('ID', explode(',', $atts['category']))->pluck('ID')->toArray();
        //     }
        //     $categories = array_merge($categories, Term::whereIn('parent', $categories)->pluck('ID')->toArray());

        //     $IDS = array_merge($IDS, TermRelationship::whereIn('term_ID', $categories)->pluck('post_ID')->toArray());
        // }

        if(isset($atts['ids']) && !empty($atts['ids'])){
            $IDS = explode(',', $atts['ids']);
        }
        $posts = Post::whereIn('ID', $IDS)->where('post_status', 'publish')->where('post_type', 'product')->orderBy('created_at', 'desc')->get();
        $posts = $posts->map(function($item){
            $item->post_title = str_replace(['{', '}'], ['[', ']'], $item->post_title);
            return $item;
        });
        return $this->view('elements.product-list', [
            'posts' => $posts,
            'class' => 'col-lg-' .round(12 / $atts['items_per_row'])
        ]);
    }
}
