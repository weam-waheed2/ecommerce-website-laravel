<?php

namespace App\Providers;

use App\Models\Form;
use App\Shortcodes\ProductListShortcode;
use App\Shortcodes\CategoryShortcode;
use App\Shortcodes\ColShortcode;
use App\Shortcodes\PostListShortcode;
use App\Shortcodes\RowShortcode;
use App\Shortcodes\TourListShortcode;
use App\Shortcodes\MoreShortcode;
use App\Shortcodes\LessShortcode;
use App\Shortcodes\FormShortcode;
use App\Shortcodes\GalleryShortcode;
use App\Shortcodes\BackgroundBannerShortcode;
use App\Shortcodes\TailorMadeBannerShortcode;
use App\Shortcodes\BtnShortcode;
use App\Shortcodes\ImageBlockShortcode;
use App\Shortcodes\BlogCategoryShortcode;
use App\Shortcodes\IconInfoShortcode;
use App\Shortcodes\SmCardShortcode;
use App\Shortcodes\DivShortcode;
use App\Shortcodes\IncludeShortcode;
use App\Shortcodes\YearShortcode;
use App\Shortcodes\TableShortcode;
use App\Shortcodes\SeparatorShortcode;
use App\Shortcodes\ItinerarySummaryShortcode;
use App\Shortcodes\ToggleShortcode;
use App\Shortcodes\AttractionShortcode;

use Illuminate\Support\ServiceProvider;
use Vedmant\LaravelShortcodes\Facades\Shortcodes;

class ShortcodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Shortcodes::add([
            'product'            => ProductListShortcode::class,
            // 'row'                   => RowShortcode::class,
            // 'col'                   => ColShortcode::class,
            // 'category'              => CategoryShortcode::class,
            // 'tours'                 => TourListShortcode::class,
            // 'carousel'              => CarouselShortcode::class,
            // 'carousel_item'         => CarouselItemShortcode::class,
            // 'posts'                 => PostListShortcode::class,
            // 'more'                  => MoreShortcode::class,
            // 'less'                  => LessShortcode::class,
            // 'background_banner'     => BackgroundBannerShortcode::class,
            // 'form'                  => FormShortcode::class,
            // 'gallery'               => GalleryShortcode::class,
            // 'tailor_made_banner'    => TailorMadeBannerShortcode::class,
            // 'btn'                   => BtnShortcode::class,
            // 'image_block'           => ImageBlockShortcode::class,
            // 'blog_category'         => BlogCategoryShortcode::class,
            // 'icon_info'             => IconInfoShortcode::class,
            // 'sm_card'               => SmCardShortcode::class,
            // 'div'                   => DivShortcode::class,
            // 'include'               => IncludeShortcode::class,
            // 'year'                  => YearShortcode::class,
            // 'table'                 => TableShortcode::class,
            // 'separator'             => SeparatorShortcode::class,
            // 'itinerary_summary'     => ItinerarySummaryShortcode::class,
            // 'toggle'                => ToggleShortcode::class,
            
            
        ]);
        foreach(Shortcodes::registered() as $key => $short){
            //dd($short);
            //dd(Shortcodes::registeredData());
        }

        Shortcodes::add('fakeurl', function ($atts, $content, $tag, $manager) {
            $rand = rand(1443, 44444) . '-fake-link';
            return '<a id="'.$rand.'" href="#">'.$content.'</a><script>document.getElementById(\''.$rand.'\').fakeLink = \''.$atts['url'].'\';document.getElementById(\''.$rand.'\').onclick = function (){this.setAttribute(\'href\', \''.$atts['url'].'\'); document.getElementById(\''.$rand.'\').click();};</script>';
        });
    }
}
