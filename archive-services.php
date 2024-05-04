<?php
/*
Template Name: Наші послуги
*/

get_header(); ?>

<main>
    <?php $servicesBackground = get_field('services_bg') ?? '' ;
       $servicesTitle = get_field('services_title') ?? '' ;
       $servicesDescription = get_field('services_description') ?? '' ;
       $servicesImage = get_field('services_image') ?? '' ;

    if($servicesBackground || $servicesTitle || $servicesDescription || $servicesImage) : 
    ?>
    <section class="our-services" style=" background-image: url('<?php echo esc_url($servicesBackground); ?>');">
       
            <div class="our-services__wrapper">
               <div class="our-services__left">
                    <div class="our-services__breadcrumps">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<nav class="yoast-breadcrumbs">', '</nav>' );
                        }?>
                    </div>
                   <div class="our-services__content">
                        <?php if ($servicesTitle): ?>
                        <h1 class="our-services__title main__title main__title--sm anim-title _anim-items">
                            <?= $servicesTitle ;?>
                        </h1>
                        <?php endif ?>
                        <?php if ($servicesDescription): ?>
                        <p class="our-services__description anim-title _anim-items">
                            <?= $servicesDescription ;?>
                        </p>
                        <?php endif ?>
                        <div class="our-services__arrow">
                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8871 4.50895C10.8871 4.17528 11.1576 3.90479 11.4913 3.90479C11.825 3.90479 12.0955 4.17528 12.0955 4.50895L12.0955 10.9534C12.0955 11.2871 11.825 11.5576 11.4913 11.5576L5.04685 11.5576C4.71318 11.5576 4.44268 11.2871 4.44268 10.9534C4.44268 10.6197 4.71318 10.3492 5.04685 10.3492L10.0327 10.3492L4.61964 4.93616C4.3837 4.70022 4.3837 4.31768 4.61964 4.08174C4.85558 3.8458 5.23812 3.8458 5.47406 4.08174L10.8871 9.49481L10.8871 4.50895Z" fill="#181818" />
                            </svg>
                        </div>
                    </div>
                <?php endif ?>
                   </div>
                    
               <?php if ($servicesImage): ?>
                <div class="our-services__right">
                        <img class="thumbnail" src='<?php echo $servicesImage['url']; ?>' alt='<?php echo $servicesImage['alt']; ?>' />
                </div>
               <?php endif ?>
            </div>
    </section>
    <section class="services-cards">
        <div class="container">
            <div class="services-cards__wrapper">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                );
                $services_query = new WP_Query($args);
                if ($services_query->have_posts()) :
                ?>
                <?php
                    while ($services_query->have_posts()) : $services_query->the_post();
                    ?>
                        <?php get_template_part('template-parts/service-card'); ?>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
                    <div class="services-cards__last">
                    <?php $lastCard = get_field('last_title') ?? '' ;
                    if ($lastCard) : ?>
                        <h2 class="services-cards__last-title">
                            <?= $lastCard ;?>
                        </h2>
                      <?php endif ?>  

                        <a href="<?php echo esc_url(get_home_url() . '/contacts/'); ?>" class="services-cards__button button">
                            <div class="button__wrapper">
                                <p><?php pll_e('contact_button') ?></p>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
    </section>
    
    <?php get_template_part('template-parts/contact-us'); ?>
</main>

<?php get_footer(); ?>