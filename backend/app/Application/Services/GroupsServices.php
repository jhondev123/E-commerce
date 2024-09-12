<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Domain\Entities\Group;
use Illuminate\Support\Facades\DB;
use App\Application\DTO\Group\GroupDTO;
use App\infra\Repositories\GroupRepository;

final class GroupsServices
{
    public function __construct(private GroupRepository $groupRepository) {}
    public function getAllGroups(): array
    {
        return $this->groupRepository->getAllGroups();
    }

    public function getGroupById(string $id): Group
    {
        return $this->groupRepository->getGroupById($id);
    }
    public function createGroup(Request $request): GroupDTO
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
        $group = new Group(name: $request->name);
        $creadtedGroup = $this->groupRepository->store($group);
        return new GroupDTO($creadtedGroup->getName(), $creadtedGroup->getId());
    }
    public function update(Request $request, string $id): GroupDTO
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
        $group = new Group(id: $id, name: $request->name);
        $updatedGroup = $this->groupRepository->update($id, $group);
        return new GroupDTO($updatedGroup->getName(), $updatedGroup->getId());
    }
    public function deleteGroup(string $id): bool
    {
        return $this->groupRepository->delete($id);
    }
}
