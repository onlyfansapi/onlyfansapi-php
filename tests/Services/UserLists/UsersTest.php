<?php

namespace Tests\Services\UserLists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\UserLists\Users\UserAddResponse;
use Onlyfansapi\UserLists\Users\UserClearResponse;
use Onlyfansapi\UserLists\Users\UserListPinnedResponse;
use Onlyfansapi\UserLists\Users\UserListResponse;
use Onlyfansapi\UserLists\Users\UserPinResponse;
use Onlyfansapi\UserLists\Users\UserRemoveResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class UsersTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->list(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->list(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 'limit',
            offset: 'offset',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserListResponse::class, $result);
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->add(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX',
            ids: ['string', 'string', 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->add(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX',
            ids: ['string', 'string', 'string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserAddResponse::class, $result);
    }

    #[Test]
    public function testClear(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->clear(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserClearResponse::class, $result);
    }

    #[Test]
    public function testClearWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->clear(
            'userListId',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserClearResponse::class, $result);
    }

    #[Test]
    public function testListPinned(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->listPinned(
            'friends',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserListPinnedResponse::class, $result);
    }

    #[Test]
    public function testListPinnedWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->listPinned(
            'friends',
            account: 'acct_XXXXXXXXXXXXXXX',
            limit: 'limit',
            offset: 'offset',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserListPinnedResponse::class, $result);
    }

    #[Test]
    public function testPin(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->pin(
            1145988,
            account: 'acct_XXXXXXXXXXXXXXX',
            userListID: 'friends'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserPinResponse::class, $result);
    }

    #[Test]
    public function testPinWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->pin(
            1145988,
            account: 'acct_XXXXXXXXXXXXXXX',
            userListID: 'friends'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserPinResponse::class, $result);
    }

    #[Test]
    public function testRemove(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->remove(
            123456,
            account: 'acct_XXXXXXXXXXXXXXX',
            userListID: 'userListId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserRemoveResponse::class, $result);
    }

    #[Test]
    public function testRemoveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->userLists->users->remove(
            123456,
            account: 'acct_XXXXXXXXXXXXXXX',
            userListID: 'userListId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserRemoveResponse::class, $result);
    }
}
