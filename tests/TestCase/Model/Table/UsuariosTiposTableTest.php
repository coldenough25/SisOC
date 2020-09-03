<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosTiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosTiposTable Test Case
 */
class UsuariosTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosTiposTable
     */
    protected $UsuariosTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UsuariosTipos',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsuariosTipos') ? [] : ['className' => UsuariosTiposTable::class];
        $this->UsuariosTipos = $this->getTableLocator()->get('UsuariosTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UsuariosTipos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
