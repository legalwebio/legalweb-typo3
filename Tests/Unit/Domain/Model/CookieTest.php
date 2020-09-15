<?php
namespace Legalweb\Legalwebcookie\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Legalweb.io <office@legalweb.io>
 */
class CookieTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Legalweb\Legalwebcookie\Domain\Model\Cookie
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Legalweb\Legalwebcookie\Domain\Model\Cookie();
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
