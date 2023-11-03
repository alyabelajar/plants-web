<?php

namespace App\Filament\Resources\UserResource\Pages;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
{


    try {
        DB::beginTransaction();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        if(data_get($data, 'roles')){
            foreach (data_get($data, 'roles') as $role) {
              $user->assignRole($role);
              $user->syncRoles($role);
            }

        }


        DB::commit();

        return $user;
    } catch (\Throwable $th) {
        DB::rollBack();
        throw $th;
    }
}

}
