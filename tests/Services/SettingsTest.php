<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Settings\SettingCheckUsernameExistsResponse;
use Onlyfansapi\Settings\SettingGetResponse;
use Onlyfansapi\Settings\SettingUpdateProfileResponse;
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
    public function testCheckUsernameExists(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->checkUsernameExists(
            'acct_XXXXXXXXXXXXXXX',
            username: 'MyNewUsername'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingCheckUsernameExistsResponse::class, $result);
    }

    #[Test]
    public function testCheckUsernameExistsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->checkUsernameExists(
            'acct_XXXXXXXXXXXXXXX',
            username: 'MyNewUsername'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingCheckUsernameExistsResponse::class, $result);
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
}
