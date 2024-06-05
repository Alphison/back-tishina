<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\HouseUser;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<HouseUser>
 */
class HouseUserResource extends ModelResource
{
    protected string $model = HouseUser::class;

    protected string $title = 'HouseUsers';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Дом', 'house', fn($item) => $item->name)->sortable(),
                BelongsTo::make('Клиент', 'user', fn($item) => $item->name)->sortable(),
                Date::make('Начало бронирования', 'check_in_date')->sortable(), 
                Date::make('Конец бронирования', 'check_out_date')->sortable(), 
            ]),
        ];
    }

    /**
     * @param HouseUser $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
