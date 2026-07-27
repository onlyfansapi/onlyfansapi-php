<?php

namespace Tests\Services\Chats;

use OnlyFansAPI\Chats\Messages\MessageDeleteResponse;
use OnlyFansAPI\Chats\Messages\MessageGetResponse;
use OnlyFansAPI\Chats\Messages\MessageLikeResponse;
use OnlyFansAPI\Chats\Messages\MessageListResponse;
use OnlyFansAPI\Chats\Messages\MessagePinResponse;
use OnlyFansAPI\Chats\Messages\MessageSearchResponse;
use OnlyFansAPI\Chats\Messages\MessageSendResponse;
use OnlyFansAPI\Chats\Messages\MessageUnlikeResponse;
use OnlyFansAPI\Chats\Messages\MessageUnpinResponse;
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
final class MessagesTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->retrieve(
            '69696969',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->retrieve(
            '69696969',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->list(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->list(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            filter: 'pinned',
            firstID: 'first_id',
            lastID: 'last_id',
            limit: 'limit',
            order: 'desc',
            skipUsers: 'all',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->delete(
            '69696969',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->delete(
            '69696969',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageDeleteResponse::class, $result);
    }

    #[Test]
    public function testLike(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->like(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageLikeResponse::class, $result);
    }

    #[Test]
    public function testLikeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->like(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageLikeResponse::class, $result);
    }

    #[Test]
    public function testPin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->pin(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagePinResponse::class, $result);
    }

    #[Test]
    public function testPinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->pin(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagePinResponse::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->search(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            query: 'Hello'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSearchResponse::class, $result);
    }

    #[Test]
    public function testSearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->search(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            query: 'Hello'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSearchResponse::class, $result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->send(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->send(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            blockBannedWords: 'strict_ban',
            giphyID: 'WAGC3LeqJvXglm5H7a',
            lockedText: true,
            mediaFiles: ['ofapi_media_abc123', 1234567890],
            previews: ['ofapi_media_abc123', 1234567890],
            price: 6.97,
            replyToMessageID: 123456789,
            rfGuest: 'rfGuest',
            rfPartner: 'rfPartner',
            rfTag: 'rfTag',
            text: 'Hello!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageSendResponse::class, $result);
    }

    #[Test]
    public function testUnlike(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->unlike(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUnlikeResponse::class, $result);
    }

    #[Test]
    public function testUnlikeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->unlike(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUnlikeResponse::class, $result);
    }

    #[Test]
    public function testUnpin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->unpin(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUnpinResponse::class, $result);
    }

    #[Test]
    public function testUnpinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->chats->messages->unpin(
            '123456789',
            account: 'acct_XXXXXXXXXXXXXXX',
            chatID: '123'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessageUnpinResponse::class, $result);
    }
}
