<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Notifications\NotificationGetCountsResponse;
use OnlyFansAPI\Notifications\NotificationListResponse;
use OnlyFansAPI\Notifications\NotificationMarkAllAsReadResponse;
use OnlyFansAPI\Notifications\NotificationSearchUsersResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NotificationsTest extends TestCase
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

        $result = $this->client->notifications->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotificationListResponse::class, $result);
    }

    #[Test]
    public function testGetCounts(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->getCounts('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotificationGetCountsResponse::class, $result);
    }

    #[Test]
    public function testMarkAllAsRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->markAllAsRead(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotificationMarkAllAsReadResponse::class, $result);
    }

    #[Test]
    public function testSearchUsers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->searchUsers(
            'acct_XXXXXXXXXXXXXXX',
            query: 'User'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotificationSearchUsersResponse::class, $result);
    }

    #[Test]
    public function testSearchUsersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->searchUsers(
            'acct_XXXXXXXXXXXXXXX',
            query: 'User'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NotificationSearchUsersResponse::class, $result);
    }
}
