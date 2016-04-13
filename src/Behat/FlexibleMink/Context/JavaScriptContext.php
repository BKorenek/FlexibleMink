<?php

namespace Behat\FlexibleMink\Context;

use Behat\FlexibleMink\PseudoInterface\FlexibleContextInterface;
use Behat\FlexibleMink\PseudoInterface\JavaScriptContextInterface;
use Behat\Mink\Exception\ExpectationException;

/**
 * {@inheritdoc}
 */
trait JavaScriptContext
{
    // Depends.
    use FlexibleContextInterface;

    // Implements.
    use JavaScriptContextInterface;

    /**
     * {@inheritdoc}
     *
     * @Then the javascript variable :variable should not be null
     */
    public function assertJavascriptVariableHasAValue($variable)
    {
        // Get the value of our variable from javascript
        $result = $this->getSession()->evaluateScript('return ' . $variable . ';');

        // If it's null - we failed
        if ($result === null) {
            throw new ExpectationException(
                'The custom variable "' . $variable . '" is null or does not exist.',
                $this->getSession()
            );
        }
    }

    /**
     * {@inheritdoc}
     *
     * @Then /^the javascript variable "(?P<variable>.+)" should(?P<not>| not) be type "(?P<type>[\w]+)"$/
     */
    public function assertJavascriptVariableType($variable, $not, $type)
    {
        // Get the type of our variable from javascript.
        $result = $this->getSession()->evaluateScript('return typeof(' . $variable . ');');

        // If it doesn't match - we failed.
        if ($result != $type xor $not) {
            throw new ExpectationException(
                "The variable \"$variable\" should$not be type $type, but is $result",
                $this->getSession()
            );
        }
    }
}
