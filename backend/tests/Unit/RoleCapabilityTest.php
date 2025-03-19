<?php

use App\Api\Contracts\ConfigRepository;
use App\Api\Services\RoleCapabilityService;
use App\Api\Supports\Arrays;
use App\Api\Supports\Strings;
use Faker\Factory as Faker;

class RoleCapabilityTest extends PHPUnit\Framework\TestCase
{
    private $faker;
    private $configRepo;
    private $configData;

    protected function setUp(): void
    {
        $this->faker = Faker::create();

        $this->configData = [];

        $this->configRepo = $this->getMockBuilder(ConfigRepository::class)
            ->getMock();

        $this->configRepo->expects($this->any())
            ->method('get')
            ->with('cms.user.capabilities.master')
            ->willReturnCallback(function ($configName, $default) {
                if (is_null($this->configData)) {
                    return $default;
                }

                return $this->configData;
            });

        $this->configRepo->expects($this->any())
            ->method('set')
            ->with('cms.user.capabilities.master')
            ->willReturnCallback(function ($configName, $setValue) {
                $this->configData = $setValue;
            });
    }

    /** @test */
    public function shouldAddCapability()
    {
        $name = $this->faker->word;
        $name2 = $this->faker->word;

        $strHelper = $this->getMockBuilder(Strings::class)
            ->disableOriginalConstructor()
            ->getMock();

        $strHelper->expects($this->any())
            ->method('slug')
            ->with($this->logicalOr($name, $name2))
            ->willReturnCallback(function ($name) {
                return $name;
            });

        $arrayHelper = $this->getMockBuilder(Arrays::class)
            ->disableOriginalConstructor()
            ->getMock();

        $arrayHelper->expects($this->any())
            ->method('searchValueRecursive')
            ->with($name)
            ->willReturnCallback(function ($name) {
                return $this->configData[$name];
            });

        $interactor = new RoleCapabilityService(
            $this->configRepo,
            $strHelper,
            $arrayHelper
        );

        $this->assertTrue($interactor->add($name));

        $expected = [
            $name => [
                'name' => $name,
                'callback' => null,
                'capabilities' => [],
            ],
        ];

        $this->assertEquals($expected, $this->configData);

        $this->assertTrue($interactor->add($name2, $name2, $name));

        $expected2 = [
            $name => [
                'name' => $name,
                'callback' => null,
                'capabilities' => [
                    $name2 => [
                        'name' => $name2,
                        'callback' => null,
                    ],
                ],
            ],
        ];

        $this->assertEquals($expected2, $this->configData);

        $this->assertEquals($this->configData[$name], $interactor->get($name));

        $this->assertEquals($this->configData, $interactor->all());
    }
}
