<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    
  use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testUpdate()
    {
        $user = factory(User::class)->create([
            'name' => 'Anan Karki',
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertSee('Anan Karki')
                    ->clickLink('Anan Karki')
                    ->clickLink('My Profile')
                    ->clickLink('Edit')
                    ->type('name','Anan')
                    ->type('email','anan@admin.com')
                    ->type('password' ,'password')
                    ->press('Update')
                    ->assertSee('Anan');
                    
        });
    }
}