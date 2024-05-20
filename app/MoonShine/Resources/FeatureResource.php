<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Feature>
 */
class FeatureResource extends ModelResource
{
    protected string $model = Feature::class;

    protected string $title = 'Свойства домов';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->sortable()->required(),
                Image::make('Иконка', 'icon')->disk('local')->dir('/public/icons')->required(),
                BelongsTo::make('Дом', 'house', fn($item) => "$item->id | $item->name")->sortable(),
            ]),
        ];
    }

    /**
     * @param Feature $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
