<?php
namespace Jiko\Blog;

/**
 * Tag class
 *
 * @author Mickael Burguet <www.rundef.com>
 */
class Tag extends TermTaxonomy
{
    /**
     * Used to set the post's type
     */
    protected $taxonomy = 'post_tag';
}
