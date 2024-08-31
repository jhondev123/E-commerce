<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\infra\Http\Repositories\GroupRepository;

final class GroupsServices
{
    public function __construct(private GroupRepository $groupRepository) {}
    public function getAllGroups(): array
    {
        return $this->groupRepository->getAllGroups();
    }

    public function getGroupById(string $id): array
    {
        return $this->groupRepository->getGroupById($id);
    }
    public function createGroup(Request $request): array
    {
        $groupData = $request->validate([
            'name' => 'required|string|unique:groups,name',
        ]);
        return $this->groupRepository->createGroup($groupData);
    }
    public function update(Request $request, string $id): array
    {
        $groupData = $request->validate([
            'name' => 'nullable|string|unique:groups,name',
        ]);
        return $this->groupRepository->updateGroup($id, $groupData);
    }
    public function deleteGroup(string $id): bool
    {
        return $this->groupRepository->deleteGroup($id);
    }
}
