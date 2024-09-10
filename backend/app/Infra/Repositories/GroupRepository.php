<?php

namespace App\infra\Repositories;

use App\Domain\Entities\Group;
use App\Models\Group as GroupModel;

final class GroupRepository
{
    public function getAllGroups(): array
    {
        return GroupModel::all()->toArray();
    }
    public function getGroupById(string $id): Group
    {
        $groupData = GroupModel::findOrFail($id);
        $group = new Group($groupData->id, $groupData->name);
        return $group;
    }
    public function createGroup(Group $group): Group
    {
        $groupModel = new GroupModel();
        $groupModel->name = $group->name;
        $groupModel->save();
        return $group;
    }
    public function updateGroup(string $id, Group $group): Group
    {
        $groupModel = GroupModel::findOrFail($id);

        $groupModel->name = $group->name;
        $groupModel->save();
        return $group;
    }
    public function deleteGroup(string $id): bool
    {
        $groupModel = GroupModel::findOrFail($id);
        return $groupModel->delete();
    }
}
