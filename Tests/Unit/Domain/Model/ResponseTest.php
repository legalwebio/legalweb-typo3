<?php
namespace legalwebio\Legalwebcookie\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Legalweb.io <office@legalweb.io>
 */
class ResponseTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \legalwebio\Legalwebcookie\Domain\Model\Response
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \legalwebio\Legalwebcookie\Domain\Model\Response();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getResultReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getResult()
        );
    }

    /**
     * @test
     */
    public function setResultForStringSetsResult()
    {
        $this->subject->setResult('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'result',
            $this->subject
        );
    }
}
