<?php
namespace Legalwebio\LegalWebTypo3\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Legalweb.io <office@legalweb.io>
 */
class CookieControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Legalwebio\LegalWebTypo3\Controller\CookieController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Legalwebio\LegalWebTypo3\Controller\CookieController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllCookiesFromRepositoryAndAssignsThemToView()
    {

        $allCookies = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $cookieRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $cookieRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCookies));
        $this->inject($this->subject, 'cookieRepository', $cookieRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('cookies', $allCookies);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
