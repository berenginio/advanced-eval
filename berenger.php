<?php
/**
 * Template Name: Blog Timeline
 * Description: A Page Template Blog. 
 */

global $theme_option;
$textdoimain = 'art23'; 
$image_thumbnail = get_post_meta(get_the_ID(),'_cmb_image_thumbnail', true);
$page_sub_title = get_post_meta(get_the_ID(),'_cmb_page_sub_title', true);

get_header(); ?>

<?php if($image_thumbnail!=''){ ?>
	<!-- HEADER -->
	<section id="project_parallax-timeline" class="header">
		<div class="well" style="background-image: url('<?php echo esc_url( $image_thumbnail ); ?>')" >
			<div id="overlay3">
				<div class="container">
					<div class="col-md-12">
						<h1 class="white heavy"><?php the_title(); ?></h1> 
						<h1 class="lead white"><?php echo htmlspecialchars_decode( $page_sub_title ); ?></h1>	
					</div>
				</div>	
			</div>
		</div>
	</section>
	<!-- //HEADER --> 
  <?php }else{ ?>
    <div class="header_colour header">
      <div class="container">
        <div class="col-md-12">
          <h1 class="white heavy"><?php the_title(); ?></h1>
          <h1 class="lead white x-light"><?php echo htmlspecialchars_decode( $page_sub_title ); ?></h1>  
          <div class="pad45"></div>
        </div>
      </div>
    </div>    
  <?php } ?>
  
  
<div class="container pad45">
	<div class="col-md-12">
		<!-- timeline -->
		<ul class="timeline">			
			<?php
            $counter = 0;
            $ref_month = '';
            $monthly = new WP_Query(array(
                'posts_per_page' => -1
            ));
            if( $monthly->have_posts() ) : while( $monthly->have_posts() ) : $monthly->the_post();		
			$format = get_post_format();			
			$id = get_the_ID();			
		?>
		<?php 
            if( get_the_date('mY') != $ref_month ) {
                if( $ref_month );
        ?>
		<!-- year -->
		<li class="year"><?php echo get_the_date('Y'); ?></li>
		<?php
            $ref_month = get_the_date('mY');
            $counter = 0;
            }
		?> 			
		<li class="event">	
			
			<!-- Image -->	
			<?php if($format=='image'){ ?>					
				<span class="month"><?php the_time('F jS');?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php $params = array( 'width' => 960, 'height' => 350 );
					$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
					<img alt="<?php the_title(); ?>" src="<?php echo esc_url( $image ); ?>" alt="">
				<?php } ?>
				<p class="pad15">
					<?php echo art23_blog_excerpt('23'); ?>
				</p>
			<!-- Audio -->
			<?php }elseif($format == 'audio'){ ?>
				<span class="month"><?php the_time('F jS');?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>
				<?php if($link_audio !=''){?>
					<iframe width="100%" height="186" src="<?php echo get_post_meta(get_the_ID(),'_cmb_link_audio', true);?>"></iframe>
				<?php }?>					
				<p class="pad15">
					<?php echo art23_blog_excerpt('23'); ?>
				</p>
			<!-- Video -->
			<?php }elseif($format=='video'){ ?>
				<span class="month"><?php the_time('F jS');?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);?>
				<?php if($link_video !=''){?>
				<div class="vendor">
					<iframe src="<?php echo get_post_meta(get_the_ID(),'_cmb_link_video', true);?>"></iframe>
				</div>
				<p>
					<?php echo art23_blog_excerpt('23'); ?>
				</p>
				<?php }?>
			 <?php }elseif($format == 'quote' ){ ?>				
				<h4><?php echo the_content(); ?></h4>				
			<?php }elseif($format == 'link'){ ?>	
				<h2><?php echo the_content(); ?></h2>					
			<?php }else{ ?>
				<span class="month"><?php the_time('F jS');?></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php if ( has_post_thumbnail() ) { ?>
					<img alt="<?php the_title(); ?>" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"/>
				<?php }?>
				<p class="pad15">
					<?php echo art23_blog_excerpt('23'); ?>
				</p>
			<?php } ?>							
        </li>
	<?php endwhile; endif; ?>
	<?php wp_reset_query(); ?>
			</ul>
		</div>
	</div>
				
<?php
get_footer();
