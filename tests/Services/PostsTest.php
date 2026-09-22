<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Posts\PostArchiveResponse;
use OnlyFansAPI\Posts\PostDeleteResponse;
use OnlyFansAPI\Posts\PostGetResponse;
use OnlyFansAPI\Posts\PostListResponse;
use OnlyFansAPI\Posts\PostNewResponse;
use OnlyFansAPI\Posts\PostPinResponse;
use OnlyFansAPI\Posts\PostStatsResponse;
use OnlyFansAPI\Posts\PostUnarchiveResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PostsTest extends TestCase
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

        $result = $this->client->posts->create(
            'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->create(
            'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!',
            blockBannedWords: 'strict_ban',
            expireDays: 3,
            fundRaisingTargetAmount: 30,
            fundRaisingTipsPresets: ['string', 'string', 'string'],
            labelIDs: 'labelIds',
            mediaFiles: ['ofapi_media_abc123', '1234567890'],
            previews: ['ofapi_media_abc123', 1234567890],
            rfTag: 'rfTag',
            saveForLater: true,
            scheduledDate: '2025-01-01T00:00:00.000Z',
            votingCorrectIndex: 0,
            votingDue: 3,
            votingOptions: ['First option', 'Second option'],
            votingType: 'poll',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->update(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->update(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!',
            blockBannedWords: 'strict_ban',
            expireDays: 3,
            fundRaisingTargetAmount: 30,
            fundRaisingTipsPresets: ['string', 'string', 'string'],
            labelIDs: 'labelIds',
            mediaFiles: 'mediaFiles',
            price: 10,
            rfTag: 'rfTag',
            saveForLater: true,
            scheduledDate: '2025-01-01T00:00:00.000Z',
            votingCorrectIndex: 0,
            votingDue: 3,
            votingOptions: ['First option', 'Second option'],
            votingType: 'poll',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostDeleteResponse::class, $result);
    }

    #[Test]
    public function testArchive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->archive(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostArchiveResponse::class, $result);
    }

    #[Test]
    public function testArchiveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->archive(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            privateArchive: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostArchiveResponse::class, $result);
    }

    #[Test]
    public function testPin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->pin(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostPinResponse::class, $result);
    }

    #[Test]
    public function testPinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->pin(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostPinResponse::class, $result);
    }

    #[Test]
    public function testStats(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->stats(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostStatsResponse::class, $result);
    }

    #[Test]
    public function testStatsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->stats(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            withHistoricalData: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostStatsResponse::class, $result);
    }

    #[Test]
    public function testUnarchive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->unarchive(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostUnarchiveResponse::class, $result);
    }

    #[Test]
    public function testUnarchiveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->unarchive(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            privateArchive: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PostUnarchiveResponse::class, $result);
    }
}
