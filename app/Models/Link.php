<?php

namespace Cornatul\Articles\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Link
 * @package Cornatul\Articles\Models
 * @property int $id
 * @property string $link
 * @property Article[] $articles
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 */
class Link extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'link',
    ];


    final public function articles():HasOne
    {
        return $this->hasOne(Article::class);
    }
}
