<?php

namespace Datakrama\Eloquid\Test;

use Datakrama\Eloquid\Test\Model\User;
use Datakrama\Eloquid\Test\Model\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function databaseTest()
    {
        $this->assertEquals([
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('users'));

        $this->assertEquals([
            'id',
            'name',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('roles'));

        $this->assertEquals([
            'id',
            'user_id',
            'role_id',
            'created_at',
            'updated_at',
        ], \Schema::getColumnListing('user_roles'));
    }
    
    /** @test */
    public function modelTest()
    {
        $users = factory(User::class, 3)
                    ->create()
                    ->each(function ($user) {
                        $user->role()->save(factory(Role::class)->make());
                    });

        
        $this->assertEquals(3, $users->count());
        
        $isUuid = $this->isUuid($users->first()->id);
        $this->assertTrue($isUuid);

        $isUuid = $this->isUuid($users->first()->role[0]->pivot->id);
        $this->assertTrue($isUuid);

        $isUuid = $this->isUuid($users->first()->role[0]->id);
        $this->assertTrue($isUuid);

        $this->assertEquals('Admin', $users->first()->role[0]->name);
    }
}
