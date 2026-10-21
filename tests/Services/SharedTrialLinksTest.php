<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListResponse;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkRevokeAccessResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SharedTrialLinksTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->sharedTrialLinks->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SharedTrialLinkListResponse::class, $result);
    }

    #[Test]
    public function testRevokeAccess(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->sharedTrialLinks->revokeAccess(
            123,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SharedTrialLinkRevokeAccessResponse::class,
            $result
        );
    }

    #[Test]
    public function testRevokeAccessWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->sharedTrialLinks->revokeAccess(
            123,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SharedTrialLinkRevokeAccessResponse::class,
            $result
        );
    }
}
