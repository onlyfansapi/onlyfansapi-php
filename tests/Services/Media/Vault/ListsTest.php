<?php

namespace Tests\Services\Media\Vault;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Media\Vault\Lists\ListDeleteResponse;
use OnlyFansAPI\Media\Vault\Lists\ListGetResponse;
use OnlyFansAPI\Media\Vault\Lists\ListNewResponse;
use OnlyFansAPI\Media\Vault\Lists\ListUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ListsTest extends TestCase
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

        $result = $this->client->media->vault->lists->create(
            'acct_XXXXXXXXXXXXXXX',
            name: 'My new list'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->create(
            'acct_XXXXXXXXXXXXXXX',
            name: 'My new list'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->retrieve(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->retrieve(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->update(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            name: 'My renamed list'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->update(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX',
            name: 'My renamed list'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->list('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->delete(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->media->vault->lists->delete(
            '123',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ListDeleteResponse::class, $result);
    }
}
