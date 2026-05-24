<?php

namespace Tests\Services\Settings;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageGetResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageToggleResponse;
use Onlyfansapi\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WelcomeMessageTest extends TestCase
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

        $result = $this->client->settings->welcomeMessage->retrieve(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WelcomeMessageGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->welcomeMessage->update(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WelcomeMessageUpdateResponse::class, $result);
    }

    #[Test]
    public function testToggle(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->welcomeMessage->toggle(
            'acct_XXXXXXXXXXXXXXX',
            enabled: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WelcomeMessageToggleResponse::class, $result);
    }

    #[Test]
    public function testToggleWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->settings->welcomeMessage->toggle(
            'acct_XXXXXXXXXXXXXXX',
            enabled: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WelcomeMessageToggleResponse::class, $result);
    }
}
