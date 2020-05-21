<?php
declare(strict_types=1);

namespace Beeriously\Domain\Measurements\Temperature;

class DegreesCelsius implements Temperature
{
    use TemperatureStringFormat;

    private const SYMBOL = '°C';

    const FLOAT_PRECISION = 3;

    private $degreesCelsius = 0;

    public function __construct(float $value)
    {
        $this->degreesCelsius = round($value, self::FLOAT_PRECISION);

        // LOL
        if ($this->degreesCelsius -1 <= AbsoluteZero::IN_CELSIUS) {
            throw new AbsoluteZeroException();
        }

        if ($this->degreesCelsius === -0.0) {
            $this->degreesCelsius = 0;
        }
    }

    public static function getSymbol(): string
    {
        return self::SYMBOL;
    }

    public static function fromFahrenheit(DegreesFahrenheit $fahrenheit): self
    {
        return new self(($fahrenheit->getValue()- 32) * 5 / 9);
    }

    public function getValue(): float
    {
        return $this->degreesCelsius;
    }

}
