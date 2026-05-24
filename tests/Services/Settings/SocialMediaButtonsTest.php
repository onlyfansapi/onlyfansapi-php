<?php

namespace Tests\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonDeleteResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonListResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonReorderResponse;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SocialMediaButtonsTest extends TestCase
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->update(
            'button_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            label: 'Instagram'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->update(
            'button_id',
            account: 'acct_XXXXXXXXXXXXXXX',
            label: 'Instagram'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->list(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->delete(
            'button_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->delete(
            'button_id',
            account: 'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonDeleteResponse::class, $result);
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->add(
            'acct_XXXXXXXXXXXXXXX',
            label: 'Instagram',
            type: 'instagram',
            value: 'example_user',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->add(
            'acct_XXXXXXXXXXXXXXX',
            label: 'Instagram',
            type: 'instagram',
            value: 'example_user',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonAddResponse::class, $result);
    }

    #[Test]
    public function testReorder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->reorder(
            'acct_XXXXXXXXXXXXXXX',
            buttonIDs: ['string', 'string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonReorderResponse::class, $result);
    }

    #[Test]
    public function testReorderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->socialMediaButtons->reorder(
            'acct_XXXXXXXXXXXXXXX',
            buttonIDs: ['string', 'string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SocialMediaButtonReorderResponse::class, $result);
    }
}
