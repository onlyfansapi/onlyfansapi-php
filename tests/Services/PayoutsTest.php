<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Payouts\PayoutGetBalancesResponse;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse;
use Onlyfansapi\Payouts\PayoutGetEligibilityResponse;
use Onlyfansapi\Payouts\PayoutListPayoutRequestsResponse;
use Onlyfansapi\Payouts\PayoutListTransactionsResponse;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PayoutsTest extends TestCase
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
    public function testListPayoutRequests(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->listPayoutRequests(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PayoutListPayoutRequestsResponse::class, $result);
    }

    #[Test]
    public function testListTransactions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->listTransactions('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PayoutListTransactionsResponse::class, $result);
    }

    #[Test]
    public function testRequestManualWithdrawal(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->requestManualWithdrawal(
            'acct_XXXXXXXXXXXXXXX',
            amount: 50
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testRequestManualWithdrawalWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->requestManualWithdrawal(
            'acct_XXXXXXXXXXXXXXX',
            amount: 50
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testRetrieveBalances(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->retrieveBalances('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PayoutGetBalancesResponse::class, $result);
    }

    #[Test]
    public function testRetrieveEarningStatistics(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->retrieveEarningStatistics(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PayoutGetEarningStatisticsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveEligibility(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->retrieveEligibility(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PayoutGetEligibilityResponse::class, $result);
    }

    #[Test]
    public function testUpdatePayoutFrequency(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->updatePayoutFrequency(
            'acct_XXXXXXXXXXXXXXX',
            frequency: 'manual'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PayoutUpdatePayoutFrequencyResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdatePayoutFrequencyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->payouts->updatePayoutFrequency(
            'acct_XXXXXXXXXXXXXXX',
            frequency: 'manual'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PayoutUpdatePayoutFrequencyResponse::class,
            $result
        );
    }
}
