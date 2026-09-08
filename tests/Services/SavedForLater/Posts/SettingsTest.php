<?php

namespace Tests\Services\SavedForLater\Posts;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingDisableAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingResponse;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingGetResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SettingsTest extends TestCase
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

        $result = $this->client->savedForLater->posts->settings->retrieve(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingGetResponse::class, $result);
    }

    #[Test]
    public function testDisableAutomaticPosting(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->posts
            ->settings
            ->disableAutomaticPosting('acct_XXXXXXXXXXXXXXX')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingDisableAutomaticPostingResponse::class,
            $result
        );
    }

    #[Test]
    public function testEnableOrUpdateAutomaticPosting(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->posts
            ->settings
            ->enableOrUpdateAutomaticPosting('acct_XXXXXXXXXXXXXXX', period: 24)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingEnableOrUpdateAutomaticPostingResponse::class,
            $result
        );
    }

    #[Test]
    public function testEnableOrUpdateAutomaticPostingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->posts
            ->settings
            ->enableOrUpdateAutomaticPosting('acct_XXXXXXXXXXXXXXX', period: 24)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingEnableOrUpdateAutomaticPostingResponse::class,
            $result
        );
    }
}
