<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Filter\Type\Date;

use Amasty\ImportCore\Api\Config\Entity\Field\FieldInterface;
use Amasty\ImportCore\Api\Config\Profile\FieldFilterInterface;
use Amasty\ImportCore\Api\Filter\FilterMetaInterface;

class Meta implements FilterMetaInterface
{
    /**
     * @var ConfigInterfaceFactory
     */
    private $configFactory;

    public function __construct(ConfigInterfaceFactory $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    public function getJsConfig(FieldInterface $field): array
    {
        return [
            'component' => 'Amasty_ImportCore/js/form/element/input-date',
            'inputConditions' => ['lastXdays', 'lastXweeks']
        ];
    }

    public function getConditions(FieldInterface $field): array
    {
        return [
            ['label' => __('is'), 'value' => 'eq'],
            ['label' => __('is not'), 'value' => 'neq'],
            ['label' => __('more or equal'), 'value' => 'gteq'],
            ['label' => __('less or equal'), 'value' => 'lteq'],
            ['label' => __('greater than'), 'value' => 'gt'],
            ['label' => __('less than'), 'value' => 'lt'],
            ['label' => __('is null'), 'value' => 'null'],
            ['label' => __('is not null'), 'value' => 'notnull'],
            ['label' => __('last X days'), 'value' => 'lastXdays'],
            ['label' => __('last X weeks'), 'value' => 'lastXweeks'],
        ];
    }

    public function prepareConfig(FieldFilterInterface $filter, $value): FilterMetaInterface
    {
        $config = $this->configFactory->create();
        $config->setValue($value);
        $filter->getExtensionAttributes()->setDateFilter($config);

        return $this;
    }

    public function getValue(FieldFilterInterface $filter)
    {
        if ($filter->getExtensionAttributes()->getDateFilter()) {
            return $filter->getExtensionAttributes()->getDateFilter()->getValue();
        }

        return [];
    }
}
