<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Settings\SettingCheckUsernameAvailabilityResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;
use Onlyfansapi\Settings\SettingUpdateSubscriptionPriceResponse;
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

        $result = $this->client->settings->retrieve('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingGetResponse::class, $result);
    }

    #[Test]
    public function testCheckUsernameAvailability(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->checkUsernameAvailability(
            'acct_XXXXXXXXXXXXXXX',
            username: 'MyNewUsername'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingCheckUsernameAvailabilityResponse::class,
            $result
        );
    }

    #[Test]
    public function testCheckUsernameAvailabilityWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->checkUsernameAvailability(
            'acct_XXXXXXXXXXXXXXX',
            username: 'MyNewUsername'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingCheckUsernameAvailabilityResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateProfile(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->updateProfile('acct_XXXXXXXXXXXXXXX');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingUpdateProfileResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscriptionPrice(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->updateSubscriptionPrice(
            'acct_XXXXXXXXXXXXXXX',
            price: '4.99'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingUpdateSubscriptionPriceResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateSubscriptionPriceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->updateSubscriptionPrice(
            'acct_XXXXXXXXXXXXXXX',
            price: '4.99'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            SettingUpdateSubscriptionPriceResponse::class,
            $result
        );
    }
}
