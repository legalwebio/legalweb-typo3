<?php
namespace Legalwebio\LegalWebTypo3\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Legalwebio.io <office@legalweb.io>
 */
class CookieTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Legalwebio\LegalWebTypo3\Domain\Model\Cookie
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Legalwebio\LegalWebTypo3\Domain\Model\Cookie();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getGuidReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGuid()
        );
    }

    /**
     * @test
     */
    public function setGuidForStringSetsGuid()
    {
        $this->subject->setGuid('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'guid',
            $this->subject
        );
    }
}
