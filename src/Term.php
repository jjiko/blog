<?php

namespace Jiko\Blog;

class Term extends Model
{
    protected $table = 'terms';
    protected $primaryKey = 'term_id';
    public $timestamps = false;
}
