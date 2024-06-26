<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Repository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;
    public function test_belongs_to_user(): void
    {
        $repository = Repository::factory()->create();
        $this->assertInstanceOf(User::class,$repository->user);
    }
}
