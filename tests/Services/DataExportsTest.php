<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\DataExports\DataExportCancelResponse;
use Onlyfansapi\DataExports\DataExportGetResponse;
use Onlyfansapi\DataExports\DataExportListResponse;
use Onlyfansapi\DataExports\DataExportNewResponse;
use Onlyfansapi\DataExports\DataExportRetryResponse;
use Onlyfansapi\DataExports\DataExportStartResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DataExportsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->create(
            endDate: '2024-12-31T23:59:59Z',
            fileType: 'csv',
            startDate: '2024-01-01T00:00:00Z',
            type: 'transactions',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->create(
            endDate: '2024-12-31T23:59:59Z',
            fileType: 'csv',
            startDate: '2024-01-01T00:00:00Z',
            type: 'transactions',
            accountIDs: ['acc_abc123', 'acc_def456'],
            autoStart: true,
            exportColumns: ['transaction_id', 'amount', 'created_at'],
            options: [
                'maxChats' => 'bar', 'maxMessages' => 'bar', 'skipMassMessages' => 'bar',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->retrieve('data_export_abc123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportListResponse::class, $result);
    }

    #[Test]
    public function testCancel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->cancel('data_export_abc123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportCancelResponse::class, $result);
    }

    #[Test]
    public function testRetry(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->retry('data_export_abc123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportRetryResponse::class, $result);
    }

    #[Test]
    public function testStart(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dataExports->start('data_export_abc123');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DataExportStartResponse::class, $result);
    }
}
