<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\SmartLinks\SmartLinkDeleteResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetStatsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListClicksResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListFansResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListSpendersResponse;
use OnlyFansAPI\SmartLinks\SmartLinkNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SmartLinksTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->create(
            accountID: 'acct_XXXXXXXX',
            linkType: 'free_trial',
            name: 'Instagram Bio Link',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->create(
            accountID: 'acct_XXXXXXXX',
            linkType: 'free_trial',
            name: 'Instagram Bio Link',
            freeTrialDays: 7,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->retrieve('01JCZWQJZXQJZXQJZXQJZXQJZX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->delete('01JCZWQJZXQJZXQJZXQJZXQJZX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkDeleteResponse::class, $result);
    }

    #[Test]
    public function testListClicks(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->listClicks('quia');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkListClicksResponse::class, $result);
    }

    #[Test]
    public function testListConversions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->listConversions('repellendus');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkListConversionsResponse::class, $result);
    }

    #[Test]
    public function testListFans(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->listFans('qui');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkListFansResponse::class, $result);
    }

    #[Test]
    public function testListSpenders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->listSpenders('reprehenderit');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkListSpendersResponse::class, $result);
    }

    #[Test]
    public function testRetrieveCohortArps(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->retrieveCohortArps('quos');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveStats(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinks->retrieveStats('saepe');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkGetStatsResponse::class, $result);
    }
}
