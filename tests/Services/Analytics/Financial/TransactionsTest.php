<?php

namespace Tests\Services\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Transactions\TransactionGetSummaryResponse;
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
final class TransactionsTest extends TestCase
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
    public function testGetByType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->transactions->getByType(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testGetByTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->transactions->getByType(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testGetSummary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->transactions->getSummary(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionGetSummaryResponse::class, $result);
    }

    #[Test]
    public function testGetSummaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->transactions->getSummary(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TransactionGetSummaryResponse::class, $result);
    }
}
