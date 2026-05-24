<?php

namespace Tests\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ReleaseFormsTest extends TestCase
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
    public function testCreateInvitationLink(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->releaseForms->createInvitationLink(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Collab Sebastian - 24/7'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ReleaseFormNewInvitationLinkResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateInvitationLinkWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->releaseForms->createInvitationLink(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Collab Sebastian - 24/7'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ReleaseFormNewInvitationLinkResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateReleaseForm(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->releaseForms->createReleaseForm(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Example Release Form'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReleaseFormNewReleaseFormResponse::class, $result);
    }

    #[Test]
    public function testCreateReleaseFormWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->releaseForms->createReleaseForm(
            'acct_XXXXXXXXXXXXXXX',
            name: 'Example Release Form'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReleaseFormNewReleaseFormResponse::class, $result);
    }

    #[Test]
    public function testListTaggableUsers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->releaseForms->listTaggableUsers(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ReleaseFormListTaggableUsersResponse::class,
            $result
        );
    }
}
