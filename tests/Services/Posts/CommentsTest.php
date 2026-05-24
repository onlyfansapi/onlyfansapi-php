<?php

namespace Tests\Services\Posts;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Posts\Comments\CommentDeleteResponse;
use Onlyfansapi\Posts\Comments\CommentLikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentListResponse;
use Onlyfansapi\Posts\Comments\CommentNewResponse;
use Onlyfansapi\Posts\Comments\CommentPinCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnlikeCommentResponse;
use Onlyfansapi\Posts\Comments\CommentUnpinCommentResponse;
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
            'id',
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
            'id',
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
            'id',
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
            'id',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 10,
            offset: 0,
            sort: 'desc'
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
    public function testLikeComment(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->likeComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentLikeCommentResponse::class, $result);
    }

    #[Test]
    public function testLikeCommentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->likeComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentLikeCommentResponse::class, $result);
    }

    #[Test]
    public function testPinComment(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->pinComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentPinCommentResponse::class, $result);
    }

    #[Test]
    public function testPinCommentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->pinComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentPinCommentResponse::class, $result);
    }

    #[Test]
    public function testUnlikeComment(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unlikeComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnlikeCommentResponse::class, $result);
    }

    #[Test]
    public function testUnlikeCommentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unlikeComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnlikeCommentResponse::class, $result);
    }

    #[Test]
    public function testUnpinComment(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unpinComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnpinCommentResponse::class, $result);
    }

    #[Test]
    public function testUnpinCommentWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->posts->comments->unpinComment(
            123,
            account: 'acct_XXXXXXXXXXXXXXX',
            postID: 123
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CommentUnpinCommentResponse::class, $result);
    }
}
