<?php

namespace Tests\Services\Statistics;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ReachTest extends TestCase
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
    public function testGetProfileVisitors(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->reach->getProfileVisitors(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testGetProfileVisitorsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->reach->getProfileVisitors(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
            filter: 'chart',
            limit: 10,
            type: 'total',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }
}
