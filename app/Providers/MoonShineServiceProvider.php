<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\House;
use App\Models\Image;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\HouseResource;
use App\MoonShine\Resources\ImageResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuGroup::make('Дома', [
                MenuItem::make('Дома', new HouseResource(), 'heroicons.home-modern')->badge(fn() => House::query()->count()),
                MenuItem::make('Категории', new CategoryResource(), 'heroicons.squares-2x2')->badge(fn() => Category::query()->count())
            ])->icon('heroicons.home-modern'),

            MenuItem::make('Изображения', new ImageResource(), 'heroicons.photo')->badge(fn() => Image::query()->count()),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
