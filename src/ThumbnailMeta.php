<?php

namespace Jiko\Blog;

class ThumbnailMeta extends PostMeta
{
    protected $with = ['attachment'];

    public function attachment()
    {
        return $this->belongsTo('Jiko\Blog\Attachment', 'meta_value');
    }

    public function __toString()
    {
        return $this->attachment->guid;
    }
}
