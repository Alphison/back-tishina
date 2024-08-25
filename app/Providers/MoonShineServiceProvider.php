<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Addition;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Feedback;
use App\Models\House;
use App\Models\HouseUser;
use App\Models\Image;
use App\Models\User;
use App\MoonShine\Resources\AdditionResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\FeatureResource;
use App\MoonShine\Resources\FeedbackResource;
use App\MoonShine\Resources\HouseResource;
use App\MoonShine\Resources\HouseUserResource;
use App\MoonShine\Resources\ImageResource;
use App\MoonShine\Resources\UserResource;
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

            MenuItem::make('Клиенты', new UserResource(), 'heroicons.users')->badge(fn() => User::query()->count()),
            MenuItem::make('Дома', new HouseResource(), 'heroicons.home-modern')->badge(fn() => House::query()->count()),
            MenuItem::make('Категории', new CategoryResource(), 'heroicons.squares-2x2')->badge(fn() => Category::query()->count()),
            MenuItem::make('Доп-изображения домов', new ImageResource(), 'heroicons.photo')->badge(fn() => Image::query()->count()),
            MenuItem::make('Свойства домов', new FeatureResource(), 'heroicons.rectangle-group')->badge(fn() => Feature::query()->count()),
            MenuItem::make('Бронирования', new HouseUserResource(), 'heroicons.shield-check')->badge(fn() => HouseUser::query()->count()),
            MenuItem::make('Обратная связь', new FeedbackResource(), 'heroicons.phone')->badge(fn() => Feedback::query()->count()),
            MenuItem::make('Дополнительно', new AdditionResource(), 'heroicons.circle-stack')->badge(fn() => Addition::query()->count()),

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
