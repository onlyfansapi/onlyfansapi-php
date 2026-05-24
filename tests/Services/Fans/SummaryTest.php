<?php

namespace Tests\Services\Fans;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Fans\Summary\SummaryGenerateSummaryResponse;
use Onlyfansapi\Fans\Summary\SummaryGetSummaryResponse;
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
    public function testGenerateSummary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->summary->generateSummary(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGenerateSummaryResponse::class, $result);
    }

    #[Test]
    public function testGenerateSummaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->summary->generateSummary(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            regenerate: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGenerateSummaryResponse::class, $result);
    }

    #[Test]
    public function testGetSummary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->summary->getSummary(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetSummaryResponse::class, $result);
    }

    #[Test]
    public function testGetSummaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fans->summary->getSummary(
            'fan_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SummaryGetSummaryResponse::class, $result);
    }
}
