<?php
/**
 * This file is used to markup the masonry layout.
 *
 * @since      1.0.1
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/public/partials
 */

foreach ($items as $key => $item)
{
	$class = 'mwall-item'.$item->itemIndex.' '.$item->itemSize;
	
	?><div class="mwall-item <?php 
		echo $item->cat_classes; ?> <?php 
		echo $item->tag_classes; ?> <?php 
		echo $item->date_classes; ?> <?php
		echo $class; ?> <?php 
		if ($perspective)
		{
			echo $perspective; ?> <?php 
		}
		echo $hoverOffset; ?>" style="padding:<?php 
		echo $wall_gutter; ?>px;"<?php
		if (isset($item->ID))
		{
			?>data-id="<?php echo $item->ID; ?>"<?php
		}
		?>data-title="<?php echo strtolower($item->post_title); ?>"
		data-date="<?php echo $item->post_date; ?>"<?php 
		if (isset($item->post_modified))
		{
			?>data-modified="<?php echo $item->post_modified; ?>"<?php 
		}
		if (isset($item->comment_count))
		{
			?>data-comments="<?php echo $item->comment_count; ?>"<?php
		}
		if (isset($item->rawIndex)) 
		{
			?>data-index="<?php echo $item->rawIndex; ?>"<?php
		}
		?>><?php

		?><div class="mwall-item-outer-cont <?php echo $flipBase; ?> <?php echo $flipClass; ?>" style="<?php 
			if ($wall_border_radius) 
			{ 
				?>border-radius: <?php echo (int)$wall_border_radius; ?>px; <?php 
			}
			if ($wall_item_border == 'yes') 
			{ 
				?>border: <?php echo (int)$wall_border_size; ?>px solid <?php echo $wall_border_color; ?>; <?php 
			}
			echo $animated_flip; ?>
			"><?php

			?><div class="mwall-item-inner-cont"><?php 
				if (isset($item->post_image) && $item->post_image && $wall_show_images == 'yes') 
				{
					if ($item->link && $wall_image_link == 'yes') 
					{ 
						?><a href="<?php echo $item->link; ?>" class="mwall-photo-link" style="background-image: url('<?php echo $item->post_image; ?>');"></a><?php 
					} 
					else 
					{ 
						?><div class="mwall-photo-link" style="background-image: url('<?php echo $item->post_image; ?>');"></div><?php 
					}
				}

				if ($this->detailBoxAll) 
				{ 
					?><div class="mwall-item-inner mwall-detail-box <?php
						if (!isset($item->post_image) || !$item->post_image || $wall_show_images == 'no')
						{
							echo 'mwall-no-image';
						}
						?>"><?php 
				
						if ($this->detailBoxDateAll && isset($item->post_date)) 
						{ 
							?><div class="mwall-date"><?php 
								echo $item->formatted_date; 
							?></div><?php 
						}

						if ($this->detailBoxTitleAll) 
						{ 
							?><h3 class="mwall-title"><?php 
								if ($item->link && $wall_title_link == 'yes') 
								{ 
									?><a href="<?php echo $item->link; ?>"><?php 
										echo $item->short_title; 
									?></a><?php 
								} 
								else 
								{ 
									?><span><?php echo $item->short_title; ?></span><?php 
								} 
							?></h3><?php 
						}

						if (($this->detailBoxCategoryAll && isset($item->post_categories) && $item->post_categories) || 
							($this->detailBoxTagsAll && isset($item->post_tags) && $item->post_tags) || 
							$this->detailBoxAuthorAll) 
						{ 
							?><div class="mwall-item-info"><?php 
								if ($this->detailBoxCategoryAll && isset($item->post_categories) && $item->post_categories) 
								{ 
									?><p class="mwall-item-category">
										<span><i class="fa fa-folder-open"></i></span>
										<?php echo $item->post_categories; ?>
									</p><?php 
								}

								if ($this->detailBoxTagsAll && isset($item->post_tags) && $item->post_tags) 
								{ 
									?><p class="mwall-item-tags">
										<span><i class="fa fa-tag"></i></span>
										<?php echo $item->post_tags; ?>
									</p><?php 
								}

								if ($this->detailBoxAuthorAll && isset($item->post_author) && $item->post_author) 
								{ 
									?><p class="mwall-item-author">
										<span><i class="fa fa-user"></i></span>
										<a href="<?php echo $item->author_link; ?>"><?php echo get_the_author_meta('nicename', $item->post_author); ?></a>
									</p><?php 
								} 
							?></div><?php 
						}

						if ($this->detailBoxIntrotextAll && isset($item->post_introtext) && $item->post_introtext) 
						{ 
							?><div class="mwall-desc"><?php 
								echo $item->post_introtext; 
							?></div><?php 
						}

						if ($this->detailBoxPriceAll && isset($item->itemPrice) && $item->priceValue) 
						{ 
							?><div class="mwall-price"><?php 
								echo $item->itemPrice; 
							?></div><?php 
						}

						if ($this->detailBoxCommentsAll && isset($item->formatted_comments) && $item->formatted_comments && $item->link) { ?>
							<div class="mwall-comments">
								<span><i class="fa fa-comment"></i></span>
								<a href="<?php echo $item->link; ?>/#respond"><?php echo $item->formatted_comments; ?></a>
							</div><?php 
						}

						if ($this->detailBoxReadmoreAll && $item->link) 
						{ 
							?><div class="mwall-readmore">
								<a href="<?php echo $item->link; ?>"><?php echo __( 'Read more', 'minitek-wall' ); ?></a>
							</div><?php 
						} 
					?></div><?php 
				} 
			?></div><?php 
			
			if ($wall_hover_box == 'yes') 
			{ 
				?><div class="mwall-hover-box <?php echo $hoverClass; ?>" style="<?php 
					echo $animated; 
					?> background-color: rgba(<?php echo $hoverBackgroundColor; ?>,<?php echo $hoverBackgroundOpacity; ?>);"><?php

					?><div class="mwall-hover-box-content"><?php 	
						if ($wall_hover_date == 'yes' && isset($item->post_date)) 
						{ 
							?><div class="mwall-date"><?php 
								echo $item->hover_formatted_date; ?>
							</div><?php 
						}

						if ($wall_hover_title == 'yes') 
						{ 
							?><h3 class="mwall-title"><?php 
								if ($item->link && $wall_title_link == 'yes') 
								{ 
									?><a href="<?php echo $item->link; ?>"><?php 
										echo $item->hover_title; 
									?></a><?php 
								} 
								else 
								{ 
									?><span><?php echo $item->hover_title; ?></span><?php 
								} 
							?></h3><?php 
						}

						if ($wall_hover_category == 'yes' || $wall_hover_tags == 'yes' || $wall_hover_author == 'yes') 
						{ 
							?><div class="mwall-item-info"><?php 
								if ($wall_hover_category == 'yes' && isset($item->post_categories) && $item->post_categories) 
								{ 
									?><p class="mwall-item-category">
										<span><i class="fa fa-folder-open"></i></span>
										<?php echo $item->post_categories; ?>
									</p><?php 
								}

								if ($wall_hover_tags == 'yes' && isset($item->post_tags) && $item->post_tags) 
								{ 
									?><p class="mwall-item-tags">
										<span><i class="fa fa-tag"></i></span>
										<?php echo $item->post_tags; ?>
									</p><?php 
								}

								if ($wall_hover_author == 'yes' && isset($item->post_author) && $item->post_author) 
								{ 
									?><p class="mwall-item-author">
										<span><i class="fa fa-user"></i></span>
										<a href="<?php echo $item->author_link; ?>"><?php echo get_the_author_meta('nicename', $item->post_author); ?></a>
									</p><?php 
								} 
							?></div><?php 
						}

						if ($wall_hover_introtext == 'yes' && isset($item->hover_introtext) && $item->hover_introtext) 
						{ 
							?><div class="mwall-desc"><?php 
								echo $item->hover_introtext; 
							?></div><?php 
						}

						if ($wall_hover_price == 'yes' && isset($item->itemPrice) && $item->priceValue) 
						{ 
							?><div class="mwall-price"><?php 
								echo $item->itemPrice; 
							?></div><?php 
						}

						if ($wall_hover_comments == 'yes' && isset($item->formatted_comments) && $item->formatted_comments && $item->link) 
						{ 
							?><div class="mwall-comments">
								<span><i class="fa fa-comment"></i></span>
								<a href="<?php echo $item->link; ?>/#respond"><?php echo $item->formatted_comments; ?></a>
							</div><?php 
						}

						if ($wall_hover_link == 'yes' || $wall_hover_lightbox == 'yes') 
						{ 
							?><div class="mwall-item-icons"><?php 
								if ($wall_hover_link == 'yes' && $item->link) 
								{ 
									?><a href="<?php echo $item->link; ?>" class="mwall-item-link-icon">
										<i class="fa fa-link"></i>
									</a><?php 
								}

								if ($wall_hover_lightbox == 'yes' && isset($item->post_image) && $item->post_image) 
								{ 
									?><a href="<?php echo $item->post_image; ?>" class="mwall-lightbox mwall-item-zoom-icon" data-lightbox="lb-<?php echo $wall_id; ?>" data-title="<?php echo $item->post_title; ?>">
										<i class="fa fa-search"></i>
									</a><?php 
								} 
							?></div><?php 
						} 
					?></div>
				</div><?php 
			} 
		?></div>
	</div><?php
}