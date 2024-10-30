<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.1.0
 * @package    Minitek-Wall
 * @subpackage Minitek-Wall/admin/partials
 */

?>

<div class="minitek-dashboard">

    <div class="row">

        <div class="mw-col-12 mw-col-8">
            <div class="media">
                <div class="pull-left">
                    <img class="media-object" src="<?php echo MW__ADMIN_PLUGIN_URL.'/images/logo.png'; ?>">
                </div>
                <div class="media-body">
                    <h2 class="media-heading">
                        <?php echo __('Minitek Wall', 'minitek-wall'); ?>
                        <span class="badge badge-success"><?php echo __('Free', 'minitek-wall'); ?></span>
                    </h2>
                    <?php echo __('A powerful masonry layout system for displaying content in WordPress.', 'minitek-wall'); ?>
                </div>
            </div>

            <div class="dashboard-thumbnails">
                <div class="thumbnail">
                    <a href="<?php echo get_admin_url().'post-new.php?post_type=mwall'; ?>">
                        <i class="icon fa fa-plus"></i>
                        <span class="thumbnail-title">
                            <?php echo __('New Wall', 'minitek-wall'); ?>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="<?php echo get_admin_url().'edit.php?post_type=mwall'; ?>">
                        <i class="icon fa fa-th-large"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Walls', 'minitek-wall'); ?>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="https://www.minitek.gr/wordpress/plugins/minitek-wall" target="_blank">
                        <i class="icon fa fa-folder"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Items Groups', 'minitek-wall'); ?>
                            <span class="badge badge-info"><?php echo __('Pro', 'minitek-wall'); ?></span>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="https://www.minitek.gr/wordpress/plugins/minitek-wall" target="_blank">
                        <i class="icon fa fa-pencil"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Custom Items', 'minitek-wall'); ?>
                            <span class="badge badge-info"><?php echo __('Pro', 'minitek-wall'); ?></span>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="https://www.minitek.gr/wordpress/plugins/minitek-wall" target="_blank">
                        <i class="icon fa fa-th"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Custom Grids', 'minitek-wall'); ?>
                            <span class="badge badge-info"><?php echo __('Pro', 'minitek-wall'); ?></span>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="<?php echo get_admin_url().'admin-post.php?action=mwall_delete_cropped_images'; ?>">
                        <i class="icon fa fa-trash"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Delete Cropped Images', 'minitek-wall'); ?>
                        </span>
                    </a>
                </div>

                <div class="thumbnail">
                    <a href="https://wordpress.org/plugins/minitek-wall/#reviews" target="_blank">
                        <i class="icon fa fa-thumbs-up"></i>
                        <span class="thumbnail-title">
                            <?php echo __('Like this plugin?', 'minitek-wall'); ?><br>
                            <span class="small">
                                <?php echo __('Please leave a review', 'minitek-wall'); ?>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mw-col-12 mw-col-4">

            <div class="dashboard-module">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo __('About', 'minitek-wall'); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div><h4><?php echo __('Plugin', 'minitek-wall'); ?></h4></div>
                                <div><a href="https://www.minitek.gr/wordpress/plugins/minitek-wall" target="_blank"><?php echo __('Minitek Wall', 'minitek-wall'); ?></a></div>
                            </li>
                            <li class="list-group-item">
                                <div><h4><?php echo __('Version', 'minitek-wall'); ?></h4></div>
                                <div>
                                    <span class="badge badge-success"><?php echo $this->version; ?></span>
                                    <span class="badge badge-success"><?php echo __('Free', 'minitek-wall'); ?></span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div><h4><?php echo __('Developer', 'minitek-wall'); ?></h4></div>
                                <div><a href="https://www.minitek.gr/" target="_blank">Minitek</a></div>
                            </li>
                            <li class="list-group-item">
                                <div><h4><?php echo __('License', 'minitek-wall'); ?></h4></div>
                                <div><a href="https://www.gnu.org/licenses/gpl-3.0.en.html" target="_blank">GNU GPLv3</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="dashboard-module">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4><?php echo __('Quick Links', 'minitek-wall'); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="fa fa-book" aria-hidden="true"></span>&nbsp;
                                <span>
                                    <a href="https://www.minitek.gr/support/documentation/wordpress/minitek-wall" target="_blank"><?php echo __('Documentation', 'minitek-wall'); ?></a>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="fa fa-list" aria-hidden="true"></span>&nbsp;
                                <span>
                                    <a href="https://www.minitek.gr/support/changelogs/wordpress/minitek-wall" target="_blank"><?php echo __('Changelog', 'minitek-wall'); ?></a>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="fa fa-support" aria-hidden="true"></span>&nbsp;
                                <span>
                                    <a href="https://wordpress.org/support/plugin/minitek-wall/" target="_blank"><?php echo __('Technical Support', 'minitek-wall'); ?></a>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="fa fa-question" aria-hidden="true"></span>&nbsp;
                                <span>
                                    <a href="https://www.minitek.gr/support/documentation/wordpress/minitek-wall/free-vs-pro" target="_blank"><?php echo __('Free vs Pro', 'minitek-wall'); ?></a>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="fa fa-lock" aria-hidden="true"></span>&nbsp;
                                <span>
                                    <a href="https://www.minitek.gr/wordpress/plugins/minitek-wall#subscriptionPlans" target="_blank"><?php echo __('Upgrade to Pro', 'minitek-wall'); ?></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>