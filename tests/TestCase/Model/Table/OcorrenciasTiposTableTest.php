<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OcorrenciasTiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OcorrenciasTiposTable Test Case
 */
class OcorrenciasTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OcorrenciasTiposTable
     */
    protected $OcorrenciasTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OcorrenciasTipos',
        'app.Setors',
        'app.Ocorrencias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OcorrenciasTipos') ? [] : ['className' => OcorrenciasTiposTable::class];
        $this->OcorrenciasTipos = $this->getTableLocator()->get('OcorrenciasTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OcorrenciasTipos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
