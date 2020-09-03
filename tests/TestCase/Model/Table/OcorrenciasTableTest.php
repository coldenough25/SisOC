<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OcorrenciasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OcorrenciasTable Test Case
 */
class OcorrenciasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OcorrenciasTable
     */
    protected $Ocorrencias;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ocorrencias',
        'app.OcorrenciasTipos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ocorrencias') ? [] : ['className' => OcorrenciasTable::class];
        $this->Ocorrencias = $this->getTableLocator()->get('Ocorrencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ocorrencias);

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
