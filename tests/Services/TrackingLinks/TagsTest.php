<?php

namespace Tests\Services\TrackingLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\TrackingLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TagsTest extends TestCase
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

        $result = $this->client->trackingLinks->tags->list(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->tags->list(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagListResponse::class, $result);
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->tags->add(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX',
            tags: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->tags->add(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX',
            tags: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagAddResponse::class, $result);
    }

    #[Test]
    public function testRemove(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->tags->remove(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX',
            tags: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagRemoveResponse::class, $result);
    }

    #[Test]
    public function testRemoveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->trackingLinks->tags->remove(
            123456789,
            account: 'acct_XXXXXXXXXXXXXXX',
            tags: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagRemoveResponse::class, $result);
    }
}
