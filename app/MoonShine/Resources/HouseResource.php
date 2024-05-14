<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\House;

use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Switcher;

/**
 * @extends ModelResource<House>
 */
class HouseResource extends ModelResource
{
    protected string $model = House::class;

    protected string $title = 'Houses';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->sortable()->required(),
                Text::make('Краткое описание', 'small_description')->sortable()->required(),
                Text::make('Адресс', 'address')->sortable()->required(),
                BelongsTo::make('Категория', 'category', fn($item) => "$item->id - $item->name")->sortable()->searchable()->required(), 
                Number::make('Цена', 'price')->sortable()->required(),
                Switcher::make('Видимость', 'visible'),
                TextArea::make('Описание', 'description')->hideOnIndex(function () {
                    return true;
                })->required(),
                Image::make('Превью', 'preview')->disk('local')->dir('/public/houses')->required()
            ]),
        ];
    }

    /**
     * @param House $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
