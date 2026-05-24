<?php

namespace Tests\Services\Analytics;

use Onlyfansapi\Analytics\Financial\FinancialGetForecastResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FinancialTest extends TestCase
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
    public function testGetForecast(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->getForecast(
            accountIDs: ['acc_abc123', 'acc_def456'],
            forecastDays: 30,
            historicalDays: 90,
            metric: 'revenue',
            model: 'linear_regression',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FinancialGetForecastResponse::class, $result);
    }

    #[Test]
    public function testGetForecastWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->getForecast(
            accountIDs: ['acc_abc123', 'acc_def456'],
            forecastDays: 30,
            historicalDays: 90,
            metric: 'revenue',
            model: 'linear_regression',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FinancialGetForecastResponse::class, $result);
    }
}
