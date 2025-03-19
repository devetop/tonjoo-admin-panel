<?php

if (! function_exists('add_context_capability')) {
    function add_context_capability($context, $name, $id = false, $parent = false, $callback = null)
    {
        return RoleCapability::addWithContext($context, $name, $id, $parent, $callback);
    }
}

if (! function_exists('add_capability')) {
    function add_capability($name, $id = false, $parent = false, $callback = null)
    {
        return RoleCapability::add($name, $id, $parent, $callback);
    }
}

if (! function_exists('get_context_capability')) {
    function get_context_capability($context, $id = false)
    {
        return RoleCapability::getWithContext($context, $id);
    }
}

if (! function_exists('get_capability')) {
    function get_capability($id = false)
    {
        return RoleCapability::get($id);
    }
}

if (! function_exists('get_capabilities')) {
    function get_capabilities()
    {
        return RoleCapability::all();
    }
}
