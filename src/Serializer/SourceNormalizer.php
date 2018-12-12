<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Source;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class SourceNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    /**
     * @var Source
     */
    private $source;

    public function denormalize($data, $class, $format = null, array $context = []): ?Source
    {
        if (!isset($data['id'], $data['title'], $data['authors'])) {
            return null;
        }

        $this->source = new Source($data['id'], $data['title'], $data['authors']);

        $this->setOptionalProperties($data);

        return $this->source;
    }

    private function setOptionalProperties(array $data)
    {
        if (!empty($data['vol'])) {
            $this->source->setVolume($data['vol']);
        }

        if (!empty($data['iss'])) {
            $this->source->setIssue($data['iss']);
        }

        if (!empty($data['year'])) {
            $this->source->setPublicationYear($data['year']);
        }

        if (!empty($data['start'])) {
            $this->source->setStartPage($data['start']);
        }

        if (!empty($data['end'])) {
            $this->source->setEndPage($data['end']);
        }
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === Source::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
