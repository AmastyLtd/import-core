<?php

declare(strict_types=1);

namespace Amasty\ImportCore\Import\SourceOption;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Store\Model\System\Store as SystemStore;

class WebsiteOptions implements OptionSourceInterface
{
    /**
     * @var SystemStore
     */
    private $systemStore;

    public function __construct(SystemStore $systemStore)
    {
        $this->systemStore = $systemStore;
    }

    public function toOptionArray()
    {
        return $this->systemStore->getWebsiteValuesForForm();
    }
}
