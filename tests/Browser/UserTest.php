<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UserTest extends DuskTestCase
{
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Registrovat')
                ->waitForText('Registrace nového uživatele')
                ->type('name', 'Petr Lukasik')
                ->type('email', 'plukas@cz...91872')
                ->waitForText('Není validní email')
                ->type('email', 'admin@admin.cz')
                ->type('password', 'heslo')
                ->press('create')
                ->waitForText('Tento email byl již zabrán.')
                ->waitForText('Minimální počet znaků 6.')
                ->waitForText('Toto pole nesmí být volné.')
                ->type('email', 'plukasik@students.zcu.cz')
                ->type('password', 'dlouheheslo')
                ->type('password_confirmation', 'dlouheheslo')
                ->press('create')
                ->waitForText('Registrace úspěšná!')
                ->assertPathIs('/');
        });
    }

    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->clickLink('Přihlásit')
                ->waitForText('Přihlášení uživatele')
                ->type('email', 'plukasik@students.zcu.cz')
                ->type('password', 'dlouheheslo')
                ->press('login')
                ->waitForText('Úspěšně přihlášen!')
                ->assertPathIs('/');
        });
    }
}
