<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\TrialLinks\TrialLinkDeleteResponse;
use OnlyFansAPI\TrialLinks\TrialLinkGetResponse;
use OnlyFansAPI\TrialLinks\TrialLinkGetStatsResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListSpendersResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListSubscribersResponse;
use OnlyFansAPI\TrialLinks\TrialLinkNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TrialLinksTest extends TestCase
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

        $result = $this->client->trialLinks->create(
            'acct_XXXXXXXXXXXXXXX',
            duration: 7,
            offerExpiration: 7,
            offerLimit: 7
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->create(
            'acct_XXXXXXXXXXXXXXX',
            duration: 7,
            offerExpiration: 7,
            offerLimit: 7,
            name: 'name',
            tags: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieve(
            'rerum',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieve(
            'rerum',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->delete(
            'rerum',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->delete(
            'rerum',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkDeleteResponse::class, $result);
    }

    #[Test]
    public function testListSpenders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->listSpenders(
            'trial_link_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkListSpendersResponse::class, $result);
    }

    #[Test]
    public function testListSpendersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->listSpenders(
            'trial_link_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 50,
            minSpend: 1,
            offset: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkListSpendersResponse::class, $result);
    }

    #[Test]
    public function testListSubscribers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->listSubscribers(
            'blanditiis',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkListSubscribersResponse::class, $result);
    }

    #[Test]
    public function testListSubscribersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->listSubscribers(
            'blanditiis',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkListSubscribersResponse::class, $result);
    }

    #[Test]
    public function testRetrieveCohortArps(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieveCohortArps(
            'reprehenderit',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveCohortArpsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieveCohortArps(
            'reprehenderit',
            account: 'acct_XXXXXXXXXXXXXXX',
            acquisitionEnd: '2026-01-31T23:59:59Z',
            acquisitionStart: '2026-01-01T00:00:00Z',
            revenueBasis: 'net',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveStats(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieveStats(
            'saepe',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkGetStatsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveStatsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trialLinks->retrieveStats(
            'saepe',
            account: 'acct_XXXXXXXXXXXXXXX',
            dateEnd: '2026-01-31T23:59:59Z',
            dateStart: '2026-01-01T00:00:00Z',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrialLinkGetStatsResponse::class, $result);
    }
}
