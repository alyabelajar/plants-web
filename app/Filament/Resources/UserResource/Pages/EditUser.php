<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $allData = User::with('roles')->find($data['id'])->toArray();
        $allData['roles'] = collect($allData['roles'])->pluck('name')->toArray();
        return $allData;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);


        if(data_get($data, 'roles')){
            foreach (data_get($data, 'roles') as $role) {
              $record->assignRole($role);
            }

        }

        return $record;
    }
}
