<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Image as ImageModel;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<ImageModel>
 */
class ImageResource extends ModelResource
{
    protected string $model = ImageModel::class;

    protected string $title = 'Дополнительные изображения домов';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Дом', 'house', fn($item) => "$item->id | $item->name")->sortable(),
                Image::make('Изображение', 'src')->disk('local')->dir('/public/images'),
            ]),
        ];
    }

    /**
     * @param ImageModel $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
