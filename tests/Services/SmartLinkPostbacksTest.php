<?php

namespace Tests\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackGetResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackListResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackNewResponse;
use OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SmartLinkPostbacksTest extends TestCase
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

        $result = $this->client->smartLinkPostbacks->create(
            conversionTypes: ['new_subscriber', 'new_transaction'],
            smartLinkScope: 'campaign_specific',
            url: 'https://example.com/postback?click={click_id}&type={conversion_type}&gclid={gclid}',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->create(
            conversionTypes: ['new_subscriber', 'new_transaction'],
            smartLinkScope: 'campaign_specific',
            url: 'https://example.com/postback?click={click_id}&type={conversion_type}&gclid={gclid}',
            smartLinkIDs: ['01JTESTLINK000000000000001'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->retrieve(123);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->update(
            123,
            conversionTypes: ['new_subscriber'],
            smartLinkScope: 'global',
            url: 'https://example.com/postback?click={click_id}&type={conversion_type}',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->update(
            123,
            conversionTypes: ['new_subscriber'],
            smartLinkScope: 'global',
            url: 'https://example.com/postback?click={click_id}&type={conversion_type}',
            smartLinkIDs: ['01JTESTLINK000000000000001'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SmartLinkPostbackListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->smartLinkPostbacks->delete(123);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }
}
