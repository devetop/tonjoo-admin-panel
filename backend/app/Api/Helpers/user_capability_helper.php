<?php

if (! function_exists('get_callback')) {
    function get_callback($callback)
    {
        if (is_string($callback) && strpos($callback, '@')) {
            $callback = explode('@', $callback);

            if(! class_exists($callback[0]))
                throw new Exception($callback[0].'@'.$callback[1].' is not a Callable', 1);

            return [app($callback[0]), $callback[1]];
        }
        elseif (is_callable($callback)) {
            return $callback;
        }
        else {
            throw new Exception($callback.' is not a Callable', 1);
        }
    }
}

if (! function_exists('is_assoc_array')) {
    function is_assoc_array($arr)
    {
        if (! is_array($arr)) return false;
        if ([] === $arr) return false;

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}

if (! function_exists('has_capability')) {
    function has_capability($capabilities)
    {
        return UserCapability::hasAny($capabilities);
    }
}

if (! function_exists('has_context_capability')) {
    function has_context_capability($context, $capabilities)
    {
        return UserCapability::hasAnyInContext($context, $capabilities);
    }
}

if (! function_exists('user_id_has_context_capability')) {
    function user_id_has_context_capability($user_id, $context, $capabilities)
    {
        return UserCapability::userHasContextCapability($user_id, $context, $capabilities);
    }
}

if (! function_exists('authorize')) {
    function authorize($capabilities)
    {
        if (! has_capability($capabilities)) {
            $capabilityStr = combine_capability_str($capabilities);
            abort(403, "Does not have any $capabilityStr access");
        }
    }
}

if (! function_exists('context_authorize')) {
    function context_authorize($context, $capabilities)
    {
        if (! has_context_capability($context, $capabilities)) {
            $capabilityStr = combine_capability_str($capabilities);
            abort(403, "Does not have any $capabilityStr access");
        }
    }
}

if (! function_exists('combine_capability_str')) {
    function combine_capability_str($capabilities)
    {
        $capabilityStr = '';
        if (is_array($capabilities)) {
            $capabilityStrs = [];
            foreach ($capabilities as $key => $capability) {
                // dd($capability);
                // if (is_array($capability)) {
                    $capabilityStrs[] = $key;
                // } else {
                //     $capabilityStrs[] = $capability;
                // }
            }
            $capabilityStr = implode('/', $capabilityStrs);
        } else {
            $capabilityStr = $capabilities;
        }

        return $capabilityStr;
    }
}

if (! function_exists('register_authorization_context')) {
    function register_authorization_context($name, $title)
    {
        $contexts = \Illuminate\Support\Facades\Config::get('cms.auth.contexts', []);
        $contexts[] = [
            'name'  => $name,
            'title' => $title,
        ];

        \Illuminate\Support\Facades\Config::set('cms.auth.contexts', array_unique($contexts, SORT_REGULAR));
    }
}
