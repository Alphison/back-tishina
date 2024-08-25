<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Addition;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Addition>
 */
class AdditionResource extends ModelResource
{
    protected string $model = Addition::class;

    protected string $title = 'Additions';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->sortable()->required(),
                Number::make('Цена', 'price')->sortable()->required(),
                BelongsTo::make('Дом', 'house', fn($item) => "$item->id - $item->name")->sortable()->searchable()->required(), 
            ]),
        ];
    }

    /**
     * @param Addition $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
