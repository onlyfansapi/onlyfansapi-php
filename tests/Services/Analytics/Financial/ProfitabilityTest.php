<?php

namespace Tests\Services\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponse;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponse;
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
final class ProfitabilityTest extends TestCase
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
    public function testGetHistory(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->profitability->getHistory(
            'acct_XXXXXXXXXXXXXXX',
            accountPrefixedID: 'acct_abc123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfitabilityGetHistoryResponse::class, $result);
    }

    #[Test]
    public function testGetHistoryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->analytics->financial->profitability->getHistory(
            'acct_XXXXXXXXXXXXXXX',
            accountPrefixedID: 'acct_abc123',
            months: 12
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfitabilityGetHistoryResponse::class, $result);
    }

    #[Test]
    public function testGetProfitability(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->analytics
            ->financial
            ->profitability
            ->getProfitability(
                accountIDs: ['acc_abc123', 'acc_def456'],
                month: 6,
                year: 2024
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ProfitabilityGetProfitabilityResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetProfitabilityWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->analytics
            ->financial
            ->profitability
            ->getProfitability(
                accountIDs: ['acc_abc123', 'acc_def456'],
                month: 6,
                year: 2024
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ProfitabilityGetProfitabilityResponse::class,
            $result
        );
    }
}
