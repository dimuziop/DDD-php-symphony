<?php declare(strict_types=1);
/**
 * Created by Patricio A. Di Muzio.
 * Date: 05/05/19
 * Time: 19:50
 */

namespace App\Tests\Behat\Security\User;


use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

final class RegisterContext implements Context
{
    /** @var KernelInterface */
    private $kernel;
    
    /** @var Response|null */
    private $response;
    
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
    
    /**
     * @When a register scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path): void
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }
    
    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived(): void
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }
}