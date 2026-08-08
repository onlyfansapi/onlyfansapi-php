<?php

namespace Tests\Services\Stories;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Stories\Highlights\HighlightAddStoryResponse;
use OnlyFansAPI\Stories\Highlights\HighlightDeleteResponse;
use OnlyFansAPI\Stories\Highlights\HighlightGetResponse;
use OnlyFansAPI\Stories\Highlights\HighlightListResponse;
use OnlyFansAPI\Stories\Highlights\HighlightNewResponse;
use OnlyFansAPI\Stories\Highlights\HighlightRemoveStoryResponse;
use OnlyFansAPI\Stories\Highlights\HighlightUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class HighlightsTest extends TestCase
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

        $result = $this->client->stories->highlights->create(
            'acct_XXXXXXXXXXXXXXX',
            coverStoryID: 9876543210,
            storyIDs: ['string', 'string'],
            title: 'My Highlight',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->create(
            'acct_XXXXXXXXXXXXXXX',
            coverStoryID: 9876543210,
            storyIDs: ['string', 'string'],
            title: 'My Highlight',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->retrieve(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->update(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            coverStoryID: 9876543210,
            storyIDs: ['string', 'string'],
            title: 'My Updated Highlight',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->update(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX',
            coverStoryID: 9876543210,
            storyIDs: ['string', 'string'],
            title: 'My Updated Highlight',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->delete(
            1234567890,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightDeleteResponse::class, $result);
    }

    #[Test]
    public function testAddStory(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->addStory(
            'vel',
            account: 'acct_XXXXXXXXXXXXXXX',
            highlightID: 1234567890,
            storyID: 2345678901,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightAddStoryResponse::class, $result);
    }

    #[Test]
    public function testAddStoryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->addStory(
            'vel',
            account: 'acct_XXXXXXXXXXXXXXX',
            highlightID: 1234567890,
            storyID: 2345678901,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightAddStoryResponse::class, $result);
    }

    #[Test]
    public function testRemoveStory(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->removeStory(
            'vel',
            account: 'acct_XXXXXXXXXXXXXXX',
            highlightID: 1234567890
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightRemoveStoryResponse::class, $result);
    }

    #[Test]
    public function testRemoveStoryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->stories->highlights->removeStory(
            'vel',
            account: 'acct_XXXXXXXXXXXXXXX',
            highlightID: 1234567890
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HighlightRemoveStoryResponse::class, $result);
    }
}
