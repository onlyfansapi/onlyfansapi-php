<?php

namespace Tests\Services\SavedForLater\Messages;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingDisableAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingResponse;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingGetResponse;
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

        $result = $this->client->savedForLater->messages->settings->retrieve(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingGetResponse::class, $result);
    }

    #[Test]
    public function testDisableAutomaticMessaging(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->messages
            ->settings
            ->disableAutomaticMessaging('acct_XXXXXXXXXXXXXXX')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingDisableAutomaticMessagingResponse::class,
            $result
        );
    }

    #[Test]
    public function testEnableOrUpdateAutomaticMessaging(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->messages
            ->settings
            ->enableOrUpdateAutomaticMessaging('acct_XXXXXXXXXXXXXXX', period: 12)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingEnableOrUpdateAutomaticMessagingResponse::class,
            $result
        );
    }

    #[Test]
    public function testEnableOrUpdateAutomaticMessagingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->savedForLater
            ->messages
            ->settings
            ->enableOrUpdateAutomaticMessaging('acct_XXXXXXXXXXXXXXX', period: 12)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingEnableOrUpdateAutomaticMessagingResponse::class,
            $result
        );
    }
}
