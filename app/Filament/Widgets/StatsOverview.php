<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Category;
use App\Models\TravelPackage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $blog_count = Blog::count('id');
        $travel_count = TravelPackage::count('id');
        $category = Category::count('id');

        return [
            Stat::make('Package Travel', $travel_count),
            Stat::make('Blog',$blog_count),
            Stat::make('Category', $category),
        ];
    }
}
