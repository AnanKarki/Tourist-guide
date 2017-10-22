<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->browse(function ($browser) {
            $browser->visit('/register')
                    ->type('name', 'anan')
                    ->type('email','anan@yahoo.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation','secret')
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }
}
