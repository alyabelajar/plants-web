<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OrderResource;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $data['total_price'] = number_format($data['total_price'], 0, ',', ',');

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $data['total_price'] = str_replace(',', '', $data['total_price']);
        $record->update($data);

        return $record;
    }
}
