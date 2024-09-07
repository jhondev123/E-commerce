<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\infra\Repositories\GroupRepository;

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

    }
    public function update(Request $request, string $id): array
    {
    }
    public function deleteGroup(string $id): bool
    {
    }
}
