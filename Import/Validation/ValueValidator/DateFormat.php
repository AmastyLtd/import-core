<?php

declare(strict_types=1);

/**
 * @author Amasty Team
 * @copyright Copyright (c) Amasty (https://www.amasty.com)
 * @package Import Core for Magento 2 (System)
 */

namespace Amasty\ImportCore\Import\Validation\ValueValidator;

use Amasty\ImportCore\Api\Validation\FieldValidatorInterface;

class DateFormat implements FieldValidatorInterface
{
    public const FORMAT = 'format';

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        if (empty($config[self::FORMAT])) {
            throw new \LogicException('No format specified for DateFormat validator');
        }
        $this->config = $config;
    }

    public function validate(array $row, string $field): bool
    {
        if (isset($row[$field]) && !empty($row[$field])) {
            $datetime = new \DateTime($row[$field]);

            return $datetime->format($this->config[self::FORMAT]) == $row[$field];
        }

        return true;
    }
}
