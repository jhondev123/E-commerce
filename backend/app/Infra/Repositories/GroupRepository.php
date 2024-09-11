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
    public function store(Group $group): Group
    {
        $groupModel = new GroupModel();
        $groupModel->name = $group->getName();
        $groupModel->save();
        return $group;
    }
    public function update(string $id, Group $group): Group
    {
        $groupModel = GroupModel::findOrFail($id);

        $groupModel->name = $group->getName();
        $groupModel->save();
        return $group;
    }
    public function delete(string $id): bool
    {
        $groupModel = GroupModel::findOrFail($id);
        return $groupModel->delete();
    }
}
