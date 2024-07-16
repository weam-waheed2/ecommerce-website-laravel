<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('elements.seo', ['seo' => $post->seo()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<style>
.cards {
	 width: 100%;
	 display: flex;
	 justify-content: center;
	 align-items: center;
}
 .cards .card {
	 height: 340px;
	 background: #fff;
	 border-radius: 4px;
	 box-shadow: 0px 20px 30px -10px rgba(0, 0, 0, 0.1);
	 max-width: 300px;
	 min-width: 100%;
	 overflow: hidden;
	 display: flex;
	 justify-content: space-between;
	 align-items: center;
	 flex-direction: column;
	 position: relative;
	 transition: all 0.4s ease;
	 margin: 0 10px;
}
 .cards .card:before {
	 height: 190px;
	 width: calc(100% + 100px);
	 content: "";
	 position: absolute;
	 background-image: linear-gradient(to top, #366f54 0%, #1e3b28 100%);
	 border-radius: 4px 4px 100% 100%;
	 transition: all 0.4s ease-out;
	 top: 0;
}
 .cards .card .close {
	 width: 18px;
	 height: 18px;
	 position: absolute;
	 z-index: 2;
	 cursor: pointer;
	 background-image: url("https://rafaelalvucas.github.io/assets/icons/misc/cross.svg");
	 background-size: 80%;
	 background-repeat: no-repeat;
	 background-position: center;
	 top: 0;
	 right: 0;
	 margin: 10px;
	 padding: 5px;
	 transition: all 0.2s ease;
}
 .cards .card .close:hover {
	 background-size: 100%;
	 opacity: 0.8;
}
 .cards .card .arrow {
	 display: none;
}
 .cards .card article {
	 z-index: 1;
	 display: flex;
	 align-items: center;
	 flex-direction: column;
	 text-align: center;
}
 .cards .card article h2 {
	 color: white;
	 margin: 0;
	 padding: 40px 20px 10px 20px;
	 font-weight: 500;
	 font-size: 24px;
	 letter-spacing: 0.5px;
}
 .cards .card article .title {
	 color: white;
	 padding: 10px 20px;
	 letter-spacing: 0.8px;
	 transition: all 0.4s ease;
}
 .cards .card article .desc {
	 padding: 10px 30px;
	 font-size: 14px;
	 text-align: center;
	 line-height: 24px;
	 color: #666;
	 height: 90px;
	 transition: all 0.4s ease-out;
}
 .cards .card article .pic {
	 width: 120px;
	 height: 120px;
	 border-radius: 100%;
	 margin: 20px 0;
	 box-shadow: 0px 0px 0px 0px rgba(255, 255, 255, 0.3);
	 transition: all 0.6s ease;
}
 .cards .card article .pic img {
	 width: 100%;
}
 .cards .card .actions {
	 width: 100%;
	 display: flex;
	 justify-content: space-between;
	 background: white;
	 z-index: 1;
}
 .cards .card .actions .btn {
	 border: 0;
	 background-color: transparent;
	 box-sizing: border-box;
	 width: calc(50% - 1px);
	 height: 36px;
	 margin: 0;
	 text-transform: uppercase;
	 font-size: 10px;
	 transition: all 0.6s ease-in-out;
	 cursor: pointer;
	 color: #016f39;
	 position: relative;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 font-weight: 500;
	 font-family: "Barlow", sans-serif;
	 letter-spacing: 0.5px;
	 background: rgb(0 152 77 / 8%);
}
 .cards .card .actions .btn span {
	 z-index: 1;
	 opacity: 1;
	 transition: all 0.4s ease-in-out;
}
 .cards .card .actions .btn .icon {
	 width: 10px;
	 opacity: 0;
	 position: absolute;
	 transition: all 0.2s ease-in-out;
}
 .cards .card .actions .btn:focus {
	 outline: 0;
}
 .cards .card .actions .btn:hover span {
	 opacity: 0;
	 transition: all 0.3s ease-in-out;
}
 .cards .card .actions .btn:hover .icon {
	 width: 22px;
	 opacity: 1;
	 transition: all 0.4s ease-in-out;
}
 .cards .card .actions .btn:hover:nth-child(3) .icon {
	 width: 18px;
}
 .cards .card .actions .btn:hover:before {
	 height: 100%;
}
 .cards .card .actions .btn.clicked span {
	 display: none;
}
 .cards .card .actions .btn.clicked .icon {
	 width: 22px;
	 opacity: 1;
	 animation: icon 0.5s ease forwards;
}
 @keyframes  icon {
	 0% {
		 width: 22px;
	}
	 50% {
		 width: 40px;
	}
	 100% {
		 width: 22px;
	}
}
 .cards .card .actions .btn.clicked:before {
	 opacity: 0.3;
	 height: 100%;
}
 .cards .card:hover {
	 transform: translateY(-10px);
	 box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.3);
}
 .cards .card:hover:before {
	 height: 100%;
	 border-radius: 4px;
}
 .cards .card:hover .desc {
	 color: white;
}
 .cards .card:hover .pic {
	 box-shadow: 0px 0px 0px 8px rgba(255, 255, 255, 0.3);
}
 .cards .card.closed {
	 min-width: 120px;
	 max-width: 120px;
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 transition: all 0.6s ease;
	 cursor: pointer;
}
 .cards .card.closed .title, .cards .card.closed .desc, .cards .card.closed .actions, .cards .card.closed .close {
	 display: none;
}
 .cards .card.closed h2 {
	 padding: 0;
	 height: 100%;
	 transform: rotate(-90deg);
	 width: 440px;
	 z-index: 2;
	 transition: all 0.6s ease;
}
 .cards .card.closed .pic {
	 border-radius: 100%;
	 height: 400px;
	 width: 400px;
	 position: absolute;
	 top: -20px;
	 margin: 0;
	 box-shadow: 0;
	 transition: all 0.6s ease;
}
 .cards .card.closed .pic img {
	 object-fit: cover;
	 height: 100%;
	 transform: translateY(20px);
}
 .cards .card.closed .pic:before {
	 content: "";
	 position: absolute;
	 width: 100%;
	 height: 100%;
	 background-color: black;
	 opacity: 0.5;
	 z-index: 1;
	 transition: all 0.4s ease;
	 transform: translateY(20px);
}
 .cards .card.closed:before {
	 height: 100%;
	 border-radius: 4px;
}
 .cards .card.closed .arrow {
	 width: 18px;
	 height: 18px;
	 position: absolute;
	 z-index: 2;
	 cursor: pointer;
	 bottom: 15px;
	 padding: 5px;
	 display: flex;
	 justify-content: center;
	 background-image: url("https://rafaelavlucas.github.io/assets/icons/misc/expand.svg");
	 background-size: 80%;
	 background-repeat: no-repeat;
	 background-position: center;
	 transition: all 0.2s ease;
}
 .cards .card.closed:hover .arrow {
	 background-size: 100%;
	 opacity: 0.6;
}
 </style>


    <section class="home-slider style-2 position-relative mb-30">
        <div class="container" style="max-width: 1610px;">
            <div class="home-slide-cover">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1 shadow-sm" style="border-radius: 30px;overflow:hidden">
                    <div class="single-hero-slider rectangle single-animation-wrap" style="background: linear-gradient(to bottom, rgb(0 0 0 / 37%) 0%, rgb(0 0 0 / 40%) 100%), url(<?php echo e(asset('assets/imgs/slider/10.jpg')); ?>);background-size: cover;background-position: center;">
                        <div class="slider-content">
                            <h1 class="display-2 mb-40" style="color: white;text-shadow: 2px 0px 6px #000000;">
                                Siam Ocean
                            </h1>
                            <p style="color: white;text-shadow: 2px 0px 6px #000000;">For Food Industries</p>
                        </div>
                    </div>
                    <div class="single-hero-slider rectangle single-animation-wrap" style="background: linear-gradient(to bottom, rgb(0 0 0 / 37%) 0%, rgb(0 0 0 / 0%) 100%), url(<?php echo e(asset('assets/imgs/slider/9.jpg')); ?>);background-size: cover;background-position: center;">
        
                    </div>
                    <div class="single-hero-slider rectangle single-animation-wrap" style="background: linear-gradient(to bottom, rgb(0 0 0 / 37%) 0%, rgb(0 0 0 / 0%) 100%), url(<?php echo e(asset('assets/imgs/slider/slider-7.jpeg')); ?>);background-size: cover;background-position: center;">
        
                    </div>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>




<section class="banners mb-25">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="title style-3 mb-40 text-center">Our <span style="color: #00984d;">Brands</span></h1>
            </div>
            <div class="col-md-6 my-2">
                <div class="cards">
                    <div class="card">
                    <span class="close"></span>
                    <span class="arrow"></span>
                    <article>
                        <h2>Safana Brand</h2>
                        <div class="title">Brand in Siam Ocean</div>
                        <div class="pic"><img src="<?php echo e(asset('assets/imgs/brand/safana-new-logo.png')); ?>" alt="Safana Logo"></div>
                    </article>
                    <div class="actions">
                        <a class="btn btn-xs w-100" href="<?php echo e(\App\Models\Post::find(7)->url()); ?>">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                
                    </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6 my-2">
                <div class="cards">
                    <div class="card">
                    <span class="close"></span>
                    <span class="arrow"></span>
                    <article>
                        <h2>Fiorella Brand</h2>
                        <div class="title">Brand in Siam Ocean</div>
                        <div class="pic"><img src="<?php echo e(asset('assets/imgs/brand/fiorella-logo.png')); ?>" alt="Fiorella Logo"></div>
                    </article>
                    <div class="actions">
                        <a class="btn btn-xs w-100" href="<?php echo e(\App\Models\Post::find(8)->url()); ?>">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>




<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3><span style="color: #00984d;">Featured</span> Categories</h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
        </div>
        <div class="carausel-6-columns-cover position-relative">
            <div class="carausel-6-columns" id="carausel-6-columns">
                <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-2 mx-1 <?php echo e($term->bg); ?> wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href='<?php echo e($term->url()); ?>'><img src="<?php echo e(asset('assets/imgs/' . $term->image)); ?>" alt="<?php echo e($term->name); ?>" /></a>
                    </figure>
                    <h6><a href='<?php echo e($term->url()); ?>'><?php echo e($term->name); ?></a></h6>
                    <span><?php echo e($term->count()); ?> items</span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<img src="<?php echo e(asset('assets/imgs/cta-3.png')); ?>" alt="" />

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Private Label <span style="color: #00984d;">Products</span></h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    
					<?php
						$products = \App\Models\Post::where('post_type', 'product')->where('post_status', 'publish')->whereIn('ID', \App\Models\termRelationship::whereIn('term_ID', 15 ? [15] : $post->Categories()->pluck('ID')->toArray())->pluck('post_ID'))->limit(9)->get()
					?>

					<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php echo $__env->make('elements.product-list', ['post' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="contact-from-area padding-20-row-col">
					<h5 class="text-brand mb-10">Contact form</h5>
					<h2 class="mb-10">Drop Us a Line</h2>
					<form class="contact-form-style mt-30" id="form_send" action="<?php echo e(url('contact/send')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<div class="row">
							<input type="hidden" name="url" value="<?php echo e(url()->current()); ?>">
							<div class="col-lg-6 col-md-6">
								<div class="input-style mb-20">
									<input name="name" placeholder="Your Name" type="text" fdprocessedid="x70n5">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="input-style mb-20">
									<input name="email" placeholder="Your Email" type="email" fdprocessedid="rby0jd">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="input-style mb-20">
									<input name="phone" placeholder="Your Phone" type="tel" fdprocessedid="rri1h">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="field_form shipping_calculator">
									<div class="form-group">
										<div class="custom_select">
											<select name="country" placeholder="Country" fdprocessedid="8mbtss" class="form-control select-active w-100">
												<option>Country</option>
												<?php $__currentLoopData = config('countries'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="textarea-style mb-30">
									<textarea name="note" placeholder="Message"></textarea>
								</div>
								<button class="submit submit-auto-width" type="submit" fdprocessedid="n506dd">Send message</button>
							</div>
						</div>
						<div class="contact-form-response-wrapper mt-3"></div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 m-auto image-contact">
				<img src="<?php echo e(asset('assets/imgs/theme/contact.png')); ?>" alt="Contact us">
			</div>
		</div>
	</div>
</section>

<div class="container faq">
    <?php if ($__env->exists('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null])) echo $__env->make('elements.faq', ['faq' => !empty($post->meta('faq')) ? json_decode($post->meta('faq'), 1) : null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/index.blade.php ENDPATH**/ ?>