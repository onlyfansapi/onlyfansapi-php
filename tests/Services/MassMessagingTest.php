<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\MassMessaging\MassMessagingDeleteResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse;
use OnlyFansAPI\MassMessaging\MassMessagingGetResponse;
use OnlyFansAPI\MassMessaging\MassMessagingListResponse;
use OnlyFansAPI\MassMessaging\MassMessagingSendResponse;
use OnlyFansAPI\MassMessaging\MassMessagingUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MassMessagingTest extends TestCase
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

        $result = $this->client->massMessaging->retrieve(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->retrieve(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->update(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->update(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!',
            blockBannedWords: 'strict_ban',
            giphyID: 'WAGC3LeqJvXglm5H7a',
            lockedText: true,
            mediaFiles: ['ofapi_media_abc123', 'string'],
            previews: ['ofapi_media_abc123', 'string'],
            price: 6.97,
            scheduledDate: '2025-01-01T00:00:00.000Z',
            userIDs: ['string'],
            userLists: [
                'fans', 'recent', 'following', 'rebill_off', 'tagged', 'string',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->delete(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->delete(
            'id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingDeleteResponse::class, $result);
    }

    #[Test]
    public function testRetrieveOverview(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->retrieveOverview(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingGetOverviewResponse::class, $result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->send(
            'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingSendResponse::class, $result);
    }

    #[Test]
    public function testSendWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->massMessaging->send(
            'acct_XXXXXXXXXXXXXXX',
            text: 'Hello!',
            blockBannedWords: 'strict_ban',
            excludedLists: [
                'fans', 'recent', 'following', 'rebill_off', 'tagged', 'string',
            ],
            giphyID: 'WAGC3LeqJvXglm5H7a',
            lockedText: true,
            mediaFiles: ['ofapi_media_abc123', 1234567890],
            previews: ['ofapi_media_abc123', 1234567890],
            price: 6.97,
            rfGuest: 'rfGuest',
            rfPartner: 'rfPartner',
            rfTag: 'rfTag',
            saveForLater: true,
            scheduledDate: '2025-01-01T00:00:00.000Z',
            subscribedWithinLastDays: 0,
            userIDs: ['string'],
            userLists: [
                'fans', 'recent', 'following', 'rebill_off', 'tagged', 'string',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MassMessagingSendResponse::class, $result);
    }
}
