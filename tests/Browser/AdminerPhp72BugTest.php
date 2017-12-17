<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminerPhp72BugTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/adminer.php')
                    ->type('auth[username]', env('DB_USERNAME'))
                    ->type('auth[password]', env('DB_PASSWORD'))
                    ->type('auth[db]', env('DB_DATABASE'))
                    ->press('Login')
                    ->click('#Table-migrations')
                    ->clickLink('Select data')
                    ->clickLink('Search')
                    ->select('where[0][col]', 'id')
                    ->click('[type="submit"]')
                    ->assertSee('Warning: count(): Parameter must be an array or an object that implements Countable');
        });
    }
}
