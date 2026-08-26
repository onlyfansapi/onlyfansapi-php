<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Stories\StoryDeleteResponse;
use OnlyFansAPI\Stories\StoryGetResponse;
use OnlyFansAPI\Stories\StoryGetStatsResponse;
use OnlyFansAPI\Stories\StoryListActiveResponse;
use OnlyFansAPI\Stories\StoryListArchiveResponse;
use OnlyFansAPI\Stories\StoryListViewersResponse;
use OnlyFansAPI\Stories\StoryMarkAsWatchedResponse;
use OnlyFansAPI\Stories\StoryNewResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class StoriesTest extends TestCase
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

        $result = $this->client->stories->create(
            'acct_XXXXXXXXXXXXXXX',
            mediaFiles: ['ofapi_media_abc123', 'string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->create(
            'acct_XXXXXXXXXXXXXXX',
            mediaFiles: ['ofapi_media_abc123', 'string'],
            canvasHeight: 1920,
            canvasWidth: 1080,
            question: [
                'color' => '#FF51DC',
                'height' => 160,
                'left' => 25,
                'text' => 'Ask me anything!',
                'top' => 30,
                'width' => 257,
            ],
            texts: [
                [
                    'text' => 'New drop today!',
                    'angle' => 0,
                    'bgColor' => '#FF51DC',
                    'color' => '#FFFFFF',
                    'fontFamily' => 'ShantellSans',
                    'fontSize' => 24,
                    'fontWeight' => 400,
                    'left' => 30.5,
                    'scale' => 1,
                    'textAlign' => 'center',
                    'textHeight' => 36,
                    'textWidth' => 140,
                    'top' => 60,
                    'type' => 'text',
                    'zIndex' => 8,
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryGetResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryDeleteResponse::class, $result);
    }

    #[Test]
    public function testListActive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->listActive('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryListActiveResponse::class, $result);
    }

    #[Test]
    public function testListArchive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->listArchive('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryListArchiveResponse::class, $result);
    }

    #[Test]
    public function testListViewers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->listViewers(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryListViewersResponse::class, $result);
    }

    #[Test]
    public function testListViewersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->listViewers(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 8,
            offset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryListViewersResponse::class, $result);
    }

    #[Test]
    public function testMarkAsWatched(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->markAsWatched(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryMarkAsWatchedResponse::class, $result);
    }

    #[Test]
    public function testMarkAsWatchedWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->markAsWatched(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryMarkAsWatchedResponse::class, $result);
    }

    #[Test]
    public function testRetrieveStats(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->retrieveStats(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryGetStatsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveStatsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->retrieveStats(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(StoryGetStatsResponse::class, $result);
    }
}
