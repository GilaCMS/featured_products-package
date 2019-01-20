<?php

if(router::action()=='index') if(!$c->category) if(!$c->search) if($c->page<2) if(!$_GET['offers']) {
    view::css('src/featured_products/featured-products.css');
    ?>
	  <div class="products-mondrian">
	  <?php
	  foreach (shop\models\product::get(['c'=>gila::option('featured_products.category',0)],8)[0] as $n=>$p) {
		  $href=gila::make_url('shop','product',['id'=>$p['id'],'slug'=>$slug]);
		  ?>
		  <div style="z-index:<?=$n?>">
			  <a href="<?=$href?>">
		  	<img data-src="<?=view::thumb_md($p['image'])?>" class="lazy img-responsive" alt="<?=$p['title']?>">
			<div class="boxed">
                   <?php 
                   $pos=mb_strpos($p['title'], ' ', 30);
                   if($pos>0){
                       echo mb_substr($p['title'],0,$pos);
                   } else echo $p['title'];
                   ?>
               <br><div class="products-mondrian-price"><?=$p['price']?> <?=gila::option('shop.currency')?></div></div>
			</a>
	  	  </div>
	  <?php } ?>
  	</div>
	<br>
<?php
}
