<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReviewTest extends DuskTestCase
{
    
  use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(User::class)->create([
            'name' => 'Anan Karki',
            'email' => 'anan@admin.com',
            'admin' => 1 ,
        ]);

         $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertSee('Anan Karki')
                    ->clickLink('Create')
                    ->select('title','Kathmandu Central Development Region')
                    ->type('post', 'Baeutiful')
                    ->type('when_to_visit', 'Jan ')
                    ->type('first_month' , 1234)
                    ->type('second_month' , 2342)
                    ->type('third_month' , 21234)
                    ->type('fourth_month' , 21234)
                    ->type('fifth_month' , 21234)
                    ->type('sixth_month', 21234)
                    ->type('seventh_month' , 21234)
                    ->type('eight_month' , 21234)
                    ->type('ninth_month' , 21234)
                    ->type('tenth_month' , 21234)
                    ->type('eleventh_month' , 21234)
                    ->type('twelveth_month', 21234)
                    ->type('domestic_tourist_livingexpense_lowrate' , 21234)
                    ->type('domestic_tourist_livingexpense_highrate' , 21234)
                    ->type('international_tourist_livingexpense_lowrate' , 21234)
                    ->type('international_tourist_livingexpense_highrate', 21234)
                    ->type('domestic_tourist_transportationexpense_lowrate' , 21234)
                    ->type('domestic_tourist_transportationexpense_highrate' ,21234)
                    ->type('international_tourist_transportationexpense_lowrate' , 21234)
                    ->type('international_tourist_transportationexpense_highrate' , 21234)
                    ->press('Create')
                    ->clickLink('Laravel')
                    ->assertSee('TOP SIGHTS')
                    ->clickLink('TOP SIGHTS')
                    ->press('POST')
                    ->press('Write a Comment')
                    ->press('Post')
                    ->press('Write a Review')
                    ->press('Post')
                    ->assertSee('Nice');
                    


                    
        });
    }
}