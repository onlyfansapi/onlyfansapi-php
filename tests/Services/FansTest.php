<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Fans\FanGetSubscriptionHistoryResponse;
use OnlyFansAPI\Fans\FanListActiveResponse;
use OnlyFansAPI\Fans\FanListAllResponse;
use OnlyFansAPI\Fans\FanListExpiredResponse;
use OnlyFansAPI\Fans\FanListLatestResponse;
use OnlyFansAPI\Fans\FanListTopResponse;
use OnlyFansAPI\Fans\FanSetCustomNameResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FansTest extends TestCase
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
    public function testGetSubscriptionHistory(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->getSubscriptionHistory(
            'user_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanGetSubscriptionHistoryResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriptionHistoryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->getSubscriptionHistory(
            'user_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanGetSubscriptionHistoryResponse::class, $result);
    }

    #[Test]
    public function testListActive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->listActive('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanListActiveResponse::class, $result);
    }

    #[Test]
    public function testListAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->listAll('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanListAllResponse::class, $result);
    }

    #[Test]
    public function testListExpired(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->listExpired('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanListExpiredResponse::class, $result);
    }

    #[Test]
    public function testListLatest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->listLatest('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanListLatestResponse::class, $result);
    }

    #[Test]
    public function testListTop(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->listTop('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanListTopResponse::class, $result);
    }

    #[Test]
    public function testSetCustomName(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->setCustomName(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            customName: '🐳Whale ($100+)'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanSetCustomNameResponse::class, $result);
    }

    #[Test]
    public function testSetCustomNameWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->setCustomName(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            customName: '🐳Whale ($100+)'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FanSetCustomNameResponse::class, $result);
    }
}
