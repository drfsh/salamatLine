<?php
namespace App\Models;

use App\Models\Product;
use Spatie\Searchable\Searchable;
use Rinvex\Categories\Models\Category as RinvexCategory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Category extends RinvexCategory implements Viewable
{
	use InteractsWithViews;

	
}