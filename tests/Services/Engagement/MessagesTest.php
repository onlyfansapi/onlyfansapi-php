<?php

namespace Tests\Services\Engagement;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Engagement\Messages\MessageGetMessageBuyersResponse;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MessagesTest extends TestCase
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
    public function testGetMessageBuyers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->engagement->messages->getMessageBuyers(
            'aut',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetMessageBuyersResponse::class, $result);
    }

    #[Test]
    public function testGetMessageBuyersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->engagement->messages->getMessageBuyers(
            'aut',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            marker: 0,
            offset: 0,
            skipUsers: 'all',
            skipUsersDups: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetMessageBuyersResponse::class, $result);
    }

    #[Test]
    public function testGetTopMessage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->engagement->messages->getTopMessage(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetTopMessageResponse::class, $result);
    }
}
