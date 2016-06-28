<?php

/**
 * Jiko\Blog\CommentBuilder
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */

namespace Jiko\Blog;

use Illuminate\Database\Eloquent\Builder;

class CommentBuilder extends Builder
{
    /**
     * Where clause for only approved comments
     *
     * @return \Jiko\Blog\CommentBuilder
     */
    public function approved()
    {
        return $this->where('comment_approved', 1);
    }
}
