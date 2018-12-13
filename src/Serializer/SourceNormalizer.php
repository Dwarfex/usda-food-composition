<?php

namespace MOrtola\UsdaFoodComposition\Serializer;

use MOrtola\UsdaFoodComposition\Model\Source;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class SourceNormalizer implements DenormalizerInterface, CacheableSupportsMethodInterface
{
    public function denormalize($data, $class, $format = null, array $context = []): ?Source
    {
        if (!isset($data['id'], $data['title'], $data['authors'])) {
            return null;
        }

        $source = new Source($data['id'], $data['title'], $data['authors']);

        return $this->withDenormalizedOptionalProperties($data, $source);
    }

    private function withDenormalizedOptionalProperties(array $data, Source $source): Source
    {
        if (!empty($data['vol'])) {
            $source->setVolume($data['vol']);
        }

        if (!empty($data['iss'])) {
            $source->setIssue($data['iss']);
        }

        if (!empty($data['year'])) {
            $source->setPublicationYear($data['year']);
        }

        if (!empty($data['start'])) {
            $source->setStartPage($data['start']);
        }

        if (!empty($data['end'])) {
            $source->setEndPage($data['end']);
        }

        return $source;
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
