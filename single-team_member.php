<?php
/**
 * 
 * Layla - Team Member Single Template
 * Last Updated: April 26, 2017
 * Current version of the plugin : 3.0.0
 * @author Bilal Hassan <bilal@smartcat.ca>
 * 
 */

get_header();

$options = get_option('smartcat_team_options') ? get_option('smartcat_team_options') : null;
$team = null;

if(class_exists( 'SmartcatTeamPlugin' ) ) :
    $team = new SmartcatTeamPlugin();
endif;

?>
<div id="content" class="site-content site-content-wrapper">
    <div class="sc-single-wrapper">

        <?php while (have_posts()) : the_post(); ?>
            <div class="sc_team_single_member <?php echo esc_attr( $options['single_template'] ); ?>">

                <div class="sc_single_side" itemscope itemtype="http://schema.org/Person">

                    <div class="inner">
                        <?php the_post_thumbnail('large'); ?>
                        <h2 class="name" itemprop="name"><?php echo the_title(); ?></h2>
                        <h3 class="title" itemprop="jobtitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'team_member_title', true ) ); ?></h3>
                        <ul class="social <?php echo 'yes' == $options['social'] ? '' : 'hidden'; ?>">

                            <?php $team->set_social(get_the_ID()); ?>

                        </ul>
                    </div>
                </div>

                <div class="sc_single_main">
                    <?php echo get_the_content(); ?>

                    <div>

                        <?php if (null !== get_post_meta(get_the_ID(), 'team_member_article_bool', true) && get_post_meta(get_the_ID(), 'team_member_article_bool', true) == 'on') : ?>
                            <div class="sc_team_posts">
                                <h3 class="skills-title"><?php echo esc_attr( get_post_meta(get_the_ID(), 'team_member_article_title', true ) ); ?></h3>

                                <?php

                                $post1 = get_post_meta(get_the_ID(), 'team_member_article1', true) > 0 ? get_post(get_post_meta(get_the_ID(), 'team_member_article1', true)) : null;
                                $post2 = get_post_meta(get_the_ID(), 'team_member_article2', true) > 0 ? get_post(get_post_meta(get_the_ID(), 'team_member_article2', true)) : null;
                                $post3 = get_post_meta(get_the_ID(), 'team_member_article3', true) > 0 ? get_post(get_post_meta(get_the_ID(), 'team_member_article3', true)) : null;
                                ?>


                                <?php
                                $content = '';
                                $content .= '<div class="sc-team-member-posts">';

                                if( $post1 ) :

                                    $content .= '<div>';

                                    if (has_post_thumbnail($post1->ID )) :
                                        $content .= '<div class="col-sm-3">' . get_the_post_thumbnail($post1->ID, 'medium') . '</div>';
                                    endif;

                                    $content .= '<div class="col-sm-9">
                                                <a href="' . esc_url( get_the_permalink($post1->ID) ) . '">' . esc_html( get_the_title($post1->ID) ) . '</a>
                                            </div>
                                        </div><div class="clear"></div>';
                                endif;

                                if( $post2 ) :

                                    $content .= '<div>';

                                    if (has_post_thumbnail($post2->ID )) :
                                        $content .= '<div class="col-sm-3">' . get_the_post_thumbnail($post2->ID, 'medium') . '</div>';
                                    endif;

                                    $content .= '<div class="col-sm-9">
                                            <a href="' . esc_url( get_the_permalink($post2->ID) ) . '">' . esc_html( get_the_title($post2->ID) ) . '</a>
                                        </div>
                                        </div><div class="clear"></div>';
                                endif;

                                if( $post3 ) :

                                    $content .= '<div>';

                                    if (has_post_thumbnail($post3->ID )) :
                                        $content .= '<div class="col-sm-3">' . get_the_post_thumbnail($post3->ID, 'medium') . '</div>';
                                    endif;

                                    $content .= '<div class="col-sm-9">
                                                <a href="' . esc_url( get_the_permalink($post3->ID) ) . '">' . esc_html( get_the_title($post3->ID) ) . '</a>
                                            </div>
                                        </div><div class="clear"></div>';
                                endif;

                                $content .= '</div>';

                                echo $content;
                                ?>


                            </div>
                        <?php endif; ?>                 

                    </div>

                </div>

            </div>

        <?php endwhile; ?>
    </div>
    <?php get_footer(); ?>
</div>
