<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\DataHandling\FieldModifier;

use Amasty\ImportCore\Api\Modifier\FieldModifierInterface;
use Amasty\ImportCore\Import\DataHandling\AbstractModifier;
use Amasty\ImportCore\Import\DataHandling\ModifierProvider;
use Magento\Framework\Serialize\SerializerInterface;

class Unserialize extends AbstractModifier implements FieldModifierInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        $config,
        SerializerInterface $serializer
    ) {
        parent::__construct($config);
        $this->serializer = $serializer;
    }

    public function transform($value)
    {
        return $this->serializer->unserialize($value) ?: $value;
    }

    public function getGroup(): string
    {
        return ModifierProvider::TEXT_GROUP;
    }

    public function getLabel(): string
    {
        return __('Unserialize')->getText();
    }
}
