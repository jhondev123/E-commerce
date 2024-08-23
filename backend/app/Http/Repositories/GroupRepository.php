<?php

namespace App\Http\Repositories;

use App\Models\Group as GroupModel;

final class GroupRepository
{
    public function getAllGroups(): array
    {
        return GroupModel::all()->toArray();
    }
    public function getGroupById(string $id): array
    {
        return GroupModel::findOrFail($id)->toArray();
    }
    public function createGroup(array $groupData): array
    {
        $groupModel = new GroupModel();
        $groupModel->name = $groupData['name'];
        if ($groupModel->save()) {
            return $groupModel->toArray();
        }
        return [];
    }
    public function updateGroup(string $id, array $groupData): array|bool
    {
        $groupModel = GroupModel::findOrFail($id);
        if (!$groupModel) {
            return false;
        }
        $groupModel->name = $groupData['name'] ?? $groupModel->name;
        if ($groupModel->save()) {
            return $groupModel->toArray();
        }
        return false;
    }
    public function deleteGroup(string $id): bool
    {
        $groupModel = GroupModel::findOrFail($id);
        if (!$groupModel) {
            return [];
        }
        return $groupModel->delete();
    }
}
