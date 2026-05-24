<?php

namespace Tests\Services;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AuthenticateTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testPollStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->pollStatus('auth_XXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticatePollStatusResponse::class, $result);
    }

    #[Test]
    public function testReauthenticate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->reauthenticate('acct_XXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testStart(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->start(
            email: 'jalyn75@example.net',
            password: 'vXIA}fx5Ek:',
            proxyCountry: 'pl'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticateStartResponse::class, $result);
    }

    #[Test]
    public function testStartWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->start(
            email: 'jalyn75@example.net',
            password: 'vXIA}fx5Ek:',
            proxyCountry: 'pl'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticateStartResponse::class, $result);
    }

    #[Test]
    public function testSubmit2fa(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->submit2fa(
            'auth_XXXXXXX',
            code: '12345'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticateSubmit2faResponse::class, $result);
    }

    #[Test]
    public function testSubmit2faWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->authenticate->submit2fa(
            'auth_XXXXXXX',
            code: '12345'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticateSubmit2faResponse::class, $result);
    }
}
