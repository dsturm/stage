<?php

namespace Stage\Composers\Components;

use Roots\Acorn\View\Composer;

class Title extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = array(
        'partials.single.title',
        'partials.archive.title',
    );

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return array(
            'title' => $this->title(),
        );
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'stage');
        }

        if (is_tax() || is_category()) {
            return get_the_archive_title();
        }

        if (is_archive()) {
            return post_type_archive_title('', false);
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'stage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'stage');
        }

        return get_the_title();
    }
}