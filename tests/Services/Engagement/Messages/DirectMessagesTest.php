<?php

namespace Tests\Services\Engagement\Messages;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageListResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DirectMessagesTest extends TestCase
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

        $result = $this->client->engagement->messages->directMessages->list(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirectMessageListResponse::class, $result);
    }

    #[Test]
    public function testChart(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->engagement->messages->directMessages->chart(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirectMessageChartResponse::class, $result);
    }
}
