<?php
namespace Legalwebio\LegalWebTypo3\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Legalweb.io <office@legalweb.io>
 */
class ApiTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Legalwebio\LegalWebTypo3\Domain\Model\Api
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Legalwebio\LegalWebTypo3\Domain\Model\Api();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getModeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMode()
        );
    }

    /**
     * @test
     */
    public function setModeForStringSetsMode()
    {
        $this->subject->setMode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'mode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVersionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVersion()
        );
    }

    /**
     * @test
     */
    public function setVersionForStringSetsVersion()
    {
        $this->subject->setVersion('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'version',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getUrlReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlForStringSetsUrl()
    {
        $this->subject->setUrl('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'url',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTermsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTerms()
        );
    }

    /**
     * @test
     */
    public function setTermsForStringSetsTerms()
    {
        $this->subject->setTerms('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'terms',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getChangelogReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getChangelog()
        );
    }

    /**
     * @test
     */
    public function setChangelogForStringSetsChangelog()
    {
        $this->subject->setChangelog('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'changelog',
            $this->subject
        );
    }
}
