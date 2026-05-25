<?php

namespace Tests\Services\Statistics;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class StatementsTest extends TestCase
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
    public function testGetEarnings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->statements->getEarnings(
            'acct_XXXXXXXXXXXXXXX',
            startDate: '2025-01-01 00:00:00'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StatementGetEarningsResponse::class, $result);
    }

    #[Test]
    public function testGetEarningsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->statements->getEarnings(
            'acct_XXXXXXXXXXXXXXX',
            startDate: '2025-01-01 00:00:00',
            endDate: '2025-03-31 23:59:59',
            type: 'total',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StatementGetEarningsResponse::class, $result);
    }
}
