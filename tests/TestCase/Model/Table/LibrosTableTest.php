<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LibrosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LibrosTable Test Case
 */
class LibrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LibrosTable
     */
    protected $Libros;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Libros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Libros') ? [] : ['className' => LibrosTable::class];
        $this->Libros = $this->getTableLocator()->get('Libros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Libros);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LibrosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
