<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use App\Models\Article;
use App\Models\Post;

class ArticlesPostsAggregator extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        Post::class, Article::class,
    ];
}
