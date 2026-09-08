<?php

namespace Tests\Services\Analytics;

use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse;
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
final class SummaryTest extends TestCase
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
    public function testGetEarningsOverview(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->summary->getEarningsOverview(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetEarningsOverviewResponse::class, $result);
    }

    #[Test]
    public function testGetEarningsOverviewWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->summary->getEarningsOverview(
            accountIDs: ['acc_abc123', 'acc_def456'],
            endDate: '2024-12-31',
            startDate: '2024-01-01',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetEarningsOverviewResponse::class, $result);
    }

    #[Test]
    public function testGetHistoricalPerformance(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->summary->getHistoricalPerformance();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testGetPeriodComparison(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->summary->getPeriodComparison(
            accountIDs: ['acc_abc123', 'acc_def456'],
            periodA: ['end' => '2024-03-31', 'start' => '2024-01-01'],
            periodB: ['end' => '2024-06-30', 'start' => '2024-04-01'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetPeriodComparisonResponse::class, $result);
    }

    #[Test]
    public function testGetPeriodComparisonWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->summary->getPeriodComparison(
            accountIDs: ['acc_abc123', 'acc_def456'],
            periodA: ['end' => '2024-03-31', 'start' => '2024-01-01'],
            periodB: ['end' => '2024-06-30', 'start' => '2024-04-01'],
            granularity: 'months',
            statType: 'totalEarnings',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetPeriodComparisonResponse::class, $result);
    }
}
