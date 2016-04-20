<?php

namespace Behat\FlexibleMink\PseudoInterface;
use Exception;

/**
 * Pseudo interface for tracking the methods of the StoreContext.
 */
trait StoreContextInterface
{
    /**
     * Asserts that the specified thing exists in the registry.
     *
     * @param  string $key The key to check.
     * @param  int    $nth The nth value of the key.
     * @return mixed  The thing from the store.
     */
    abstract protected function assertIsStored($key, $nth = null);

    /**
     * Retrieves the thing stored under the specified key on the nth position in the registry.
     *
     * @param  string $key The key to retrieve the thing for.
     * @param  int    $nth The nth value for the thing to retrieve.
     * @return mixed  The thing that was retrieved.
     */
    abstract protected function get($key, $nth = null);

    /**
     * Gets the value of a property from an object of the store.
     *
     * @param  string    $key      The key to retrieve the object for.
     * @param  string    $property The name of the property to retrieve from the object.
     * @param  int       $nth      The nth value for the object to retrieve.
     * @throws Exception If an object was not found under the specified key.
     * @throws Exception If the object does not have the specified property.
     * @return mixed     The value of the property.
     */
    abstract protected function getThingProperty($key, $property, $nth = null);

    /**
     * Checks that the specified thing exists in the registry.
     *
     * @param  string $key The key to check.
     * @param  int    $nth The nth value of the key.
     * @return bool   True if the thing exists, false if not.
     */
    abstract protected function isStored($key, $nth = null);

    /**
     * Stores the specified thing under the specified key in the registry.
     *
     * @param mixed  $thing The thing to be stored.
     * @param string $key   The key to store the thing under.
     */
    abstract protected function put($thing, $key);
}
