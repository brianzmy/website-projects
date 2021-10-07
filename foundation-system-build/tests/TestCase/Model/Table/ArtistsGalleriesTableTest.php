<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtistsGalleriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtistsGalleriesTable Test Case
 */
class ArtistsGalleriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtistsGalleriesTable
     */
    public $ArtistsGalleries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArtistsGalleries',
        'app.Artists',
        'app.Galleries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArtistsGalleries') ? [] : ['className' => ArtistsGalleriesTable::class];
        $this->ArtistsGalleries = TableRegistry::getTableLocator()->get('ArtistsGalleries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArtistsGalleries);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
