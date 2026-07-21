<?php

namespace Tests\Services\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Posts\Comments\CommentDeleteResponse;
use OnlyFansAPI\Posts\Comments\CommentLikeResponse;
use OnlyFansAPI\Posts\Comments\CommentListResponse;
use OnlyFansAPI\Posts\Comments\CommentNewResponse;
use OnlyFansAPI\Posts\Comments\CommentPinResponse;
use OnlyFansAPI\Posts\Comments\CommentUnlikeResponse;
use OnlyFansAPI\Posts\Comments\CommentUnpinResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CommentsTest extends TestCase
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

        $result = $this->client->posts->comments->create(
            'alias',
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'This is a comment.'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->create(
            'alias',
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'This is a comment.',
            answerTo: 123,
            giphyID: 'giphy123',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->list(
            'alias',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->list(
            'alias',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0,
            sort: 'desc',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->delete(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->delete(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentDeleteResponse::class, $result);
    }

    #[Test]
    public function testLike(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->like(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentLikeResponse::class, $result);
    }

    #[Test]
    public function testLikeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->like(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentLikeResponse::class, $result);
    }

    #[Test]
    public function testPin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->pin(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentPinResponse::class, $result);
    }

    #[Test]
    public function testPinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->pin(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentPinResponse::class, $result);
    }

    #[Test]
    public function testUnlike(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unlike(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnlikeResponse::class, $result);
    }

    #[Test]
    public function testUnlikeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unlike(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnlikeResponse::class, $result);
    }

    #[Test]
    public function testUnpin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unpin(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnpinResponse::class, $result);
    }

    #[Test]
    public function testUnpinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unpin(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnpinResponse::class, $result);
    }
}
