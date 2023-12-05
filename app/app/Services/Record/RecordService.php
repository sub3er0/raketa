<?php

declare(strict_types=1);

namespace App\Services\Record;

use App\Http\Requests\Record\RecordRequest;
use App\Models\Record;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class RecordService
{
    /**
     * @param RecordRequest $request
     * @param User $user
     * @return Record
     */
    public function save(RecordRequest $request, User $user)
    {
        $record = new Record([
            'title' => $request->get('title'),
            'image' => $request->get('image') ?? null,
            'category_id' => $request->get('category_id')
        ]);
        $record->creator_id = $user->id;
        $record->save();
        return $record;
    }

    /**
     * @param User $user
     * @return Collection|mixed
     */
    public function getRecords(User $user)
    {
        $result = new Collection();;
        if ($user->role_id == Role::MANAGER_ROLE_ID) {
            $customers = User::where('manager_id', $user->id)->get();
            foreach ($customers as $customer) {
                $result = $result->merge($customer->records);
            }
        } else {
            return $user->records;
        }
        return $result;
    }
}
