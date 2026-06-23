<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\TrackingLinks\TrackingLinkDeleteResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetStatsResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSpendersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkListSubscribersResponse;
use OnlyFansAPI\TrackingLinks\TrackingLinkNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TrackingLinksTest extends TestCase
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

        $result = $this->client->trackingLinks->create(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Twitter bio'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->create(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Twitter bio',
            tags: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->retrieve(
            'enim',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->retrieve(
            'enim',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->delete(
            'enim',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->delete(
            'enim',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkDeleteResponse::class, $result);
    }

    #[Test]
    public function testGetCohortArps(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->getCohortArps(
            'aut',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetCohortArpsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->getCohortArps(
            'aut',
            account: 'acct_XXXXXXXXXXXXXXX',
            acquisitionEnd: '2026-01-31T23:59:59Z',
            acquisitionStart: '2026-01-01T00:00:00Z',
            revenueBasis: 'net',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetStats(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->getStats(
            'dolorum',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkGetStatsResponse::class, $result);
    }

    #[Test]
    public function testGetStatsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->getStats(
            'dolorum',
            account: 'acct_XXXXXXXXXXXXXXX',
            dateEnd: '2026-01-31T23:59:59Z',
            dateStart: '2026-01-01T00:00:00Z',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkGetStatsResponse::class, $result);
    }

    #[Test]
    public function testListSpenders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->listSpenders(
            'tracking_link_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkListSpendersResponse::class, $result);
    }

    #[Test]
    public function testListSpendersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->listSpenders(
            'tracking_link_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 50,
            minSpend: 1,
            offset: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TrackingLinkListSpendersResponse::class, $result);
    }

    #[Test]
    public function testListSubscribers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->listSubscribers(
            'tracking_link_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TrackingLinkListSubscribersResponse::class,
            $result
        );
    }

    #[Test]
    public function testListSubscribersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->listSubscribers(
            'tracking_link_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            TrackingLinkListSubscribersResponse::class,
            $result
        );
    }
}
