<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsResponse;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class StatisticsTest extends TestCase
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
    public function testCalculateTotalTransactions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->calculateTotalTransactions(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            StatisticCalculateTotalTransactionsResponse::class,
            $result
        );
    }

    #[Test]
    public function testCalculateTotalTransactionsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->calculateTotalTransactions(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            StatisticCalculateTotalTransactionsResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetOverview(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->getOverview('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StatisticGetOverviewResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriberMetrics(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->getSubscriberMetrics(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            StatisticGetSubscriberMetricsResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetSubscriberMetricsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->statistics->getSubscriberMetrics(
            'acct_XXXXXXXXXXXXXXX',
            endDate: '2025-03-31 23:59:59',
            startDate: '2025-01-01 00:00:00',
            detailed: false,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            StatisticGetSubscriberMetricsResponse::class,
            $result
        );
    }
}
