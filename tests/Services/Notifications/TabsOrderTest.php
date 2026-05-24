<?php

namespace Tests\Services\Notifications;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderGetResponse;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TabsOrderTest extends TestCase
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->tabsOrder->update(
            'acct_XXXXXXXXXXXXXXX',
            tabs: [
                'all',
                'subscriptions',
                'onlyfans',
                'purchases',
                'tips',
                'tags',
                'comments',
                'mentions',
                'likes',
                'promotions',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TabsOrderUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->tabsOrder->update(
            'acct_XXXXXXXXXXXXXXX',
            tabs: [
                'all',
                'subscriptions',
                'onlyfans',
                'purchases',
                'tips',
                'tags',
                'comments',
                'mentions',
                'likes',
                'promotions',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TabsOrderUpdateResponse::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->notifications->tabsOrder->get(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TabsOrderGetResponse::class, $result);
    }
}
