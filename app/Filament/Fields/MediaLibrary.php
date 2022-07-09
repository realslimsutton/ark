<?php

namespace App\Filament\Fields;

use Closure;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaLibrary extends SpatieMediaLibraryFileUpload
{
    protected $filters;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadStateFromRelationshipsUsing(function (MediaLibrary $component, HasMedia $record): void {
            /** @var Model&HasMedia $record */

            $files = $record->load('media')->getMedia($component->getCollection(),
                $this->evaluate($this->filters))
                ->when(
                    !$component->isMultiple(),
                    fn(Collection $files): Collection => $files->take(1),
                )
                ->mapWithKeys(function (Media $file): array {
                    $uuid = $file->getAttributeValue('uuid');

                    return [$uuid => $uuid];
                })
                ->toArray();

            $component->state($files);
        });
    }

    public function filters(array|Closure $filters): static
    {
        $this->filters = $filters;

        return $this;
    }
}
