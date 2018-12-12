<?php

namespace MOrtola\UsdaFoodComposition\Tests\Serializer;

use MOrtola\UsdaFoodComposition\Model\Source;
use MOrtola\UsdaFoodComposition\Serializer\SourceNormalizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class SourceNormalizerTest extends TestCase
{
    /**
     * @var SourceNormalizer
     */
    private $normalizer;

    public function setUp()
    {
        $this->normalizer = new SourceNormalizer();
    }

    public function testDenormalize()
    {
        $sourceAsArray = [
            'id' => 32,
            'title' => 'Fake title',
            'authors' => 'Fake authors',
            'vol' => '54',
            'iss' => 'Iss',
            'year' => '2006',
            'start' => '1',
            'end' => 3,
        ];

        $resultSource = new Source(32, 'Fake title', 'Fake authors');
        $resultSource->setVolume(54);
        $resultSource->setIssue('Iss');
        $resultSource->setPublicationYear(2006);
        $resultSource->setStartPage(1);
        $resultSource->setEndPage(3);

        Assert::assertEquals(
            $resultSource,
            $this->normalizer->denormalize($sourceAsArray, Source::class)
        );
    }

    public function testDenormalizeWithoutRequiredAttributes()
    {
        $sourceAsArray = [
            'title' => 'Fake title',
            'authors' => 'Fake authors',
        ];

        Assert::assertNull($this->normalizer->denormalize($sourceAsArray, Source::class));
    }

    public function testHasCacheableSupportsMethod()
    {
        Assert::assertTrue($this->normalizer->hasCacheableSupportsMethod());
    }

    public function testSupportsDenormalization()
    {
        $this->assertTrue($this->normalizer->supportsDenormalization('invent', Source::class));
        $this->assertFalse($this->normalizer->supportsDenormalization('invent', 'Invent'));
    }
}
