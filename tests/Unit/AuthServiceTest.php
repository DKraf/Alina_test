<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin_WithValidCredentials_ReturnsToken()
    {
        $request = [
            'phone' => '+77714724530',
            'password' => '1q2w3e4r5t6y',
        ];

        $user = User::factory()->create([
            'phone' => '+77714724530',
            'password' => Hash::make('1q2w3e4r5t6y'),
        ]);

        $service = new AuthService();

        $result = $service->login($request);

        $this->assertArrayHasKey('token', $result);
        $this->assertNotNull($result['token']);
    }


    public function testLogin_WithInvalidCredentials_ThrowsException()
    {
        $request =[
            'phone' => '+77714724530',
            'password' => '1q2w3e4r5t6y',
        ];

        $service = new AuthService();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Пользователь c указанным номером не найден');

        $service->login($request);
    }


    public function testLogout_WhenAuthenticated_LogsOutUserAndReturnsUserId()
    {
        $user = User::factory()->create();
        Auth::shouldReceive('user')->once()->andReturn($user);
        $user->tokens = collect();

        $service = new AuthService();

        $result = $service->logout();

        $this->assertEquals(['user_id' => $user->id], $result);
    }


}
