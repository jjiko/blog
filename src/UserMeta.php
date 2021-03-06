<?php

/**
 * Jiko\Blog\UserMeta
 *
 * @author Mickael Burguet <www.rundef.com>
 */

namespace Jiko\Blog;

class UserMeta extends Model
{
    protected $table = 'usermeta';
    protected $primaryKey = 'umeta_id';
    public $timestamps = false;
    protected $fillable = ['meta_key', 'meta_value', 'user_id'];

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Jiko\Blog\User');
    }

    /**
     * Override newCollection() to return a custom collection
     *
     * @param array $models
     * @return \Jiko\Blog\UserMetaCollection
     */
    public function newCollection(array $models = [])
    {
        return new UserMetaCollection($models);
    }
}
