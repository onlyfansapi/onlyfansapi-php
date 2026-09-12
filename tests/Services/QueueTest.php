<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Queue\QueueCountResponse;
use OnlyFansAPI\Queue\QueueListResponse;
use OnlyFansAPI\Queue\QueuePublishResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class QueueTest extends TestCase
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

        $result = $this->client->queue->list(
            'acct_XXXXXXXXXXXXXXX',
            publishDateEnd: '2025-01-01',
            publishDateStart: '2025-01-01',
            timezone: 'Europe/Prague',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueueListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->list(
            'acct_XXXXXXXXXXXXXXX',
            publishDateEnd: '2025-01-01',
            publishDateStart: '2025-01-01',
            timezone: 'Europe/Prague',
            limit: 20,
            type: ['post'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueueListResponse::class, $result);
    }

    #[Test]
    public function testCount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->count(
            'acct_XXXXXXXXXXXXXXX',
            publishDateEnd: '2025-01-01',
            publishDateStart: '2025-01-01',
            timezone: 'Europe/Prague',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueueCountResponse::class, $result);
    }

    #[Test]
    public function testCountWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->count(
            'acct_XXXXXXXXXXXXXXX',
            publishDateEnd: '2025-01-01',
            publishDateStart: '2025-01-01',
            timezone: 'Europe/Prague',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueueCountResponse::class, $result);
    }

    #[Test]
    public function testPublish(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->publish(
            'queue_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueuePublishResponse::class, $result);
    }

    #[Test]
    public function testPublishWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->publish(
            'queue_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(QueuePublishResponse::class, $result);
    }
}
