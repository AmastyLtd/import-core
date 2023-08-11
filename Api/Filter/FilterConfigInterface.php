<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Api\Filter;

interface FilterConfigInterface
{
    /**
     * Get filer config using filter type Id
     *
     * @param string $type
     * @return array
     */
    public function get(string $type): array;

    /**
     * Get all filters configs
     *
     * @return array
     */
    public function all(): array;
}
