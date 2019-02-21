<?php

class Dispatch
{
    protected static $events = [];


    public static function add($name, $handler, $data = null, $append = true)
    {
        if ($append) {
            self::$events[$name][] = [$handler, $data];
        } else {
            if (empty(self::$events[$name])) {
                self::$events[$name] = [];
            }
            array_unshift(self::$events[$name], [$handler, $data]);
        }
    }

    public static function remove($name, $handler = null)
    {
        if (empty(self::$events[$name])) {
            return false;
        }
        if ($handler === null) {
            unset(self::$events[$name]);
            return true;
        } else {
            $removed = false;
            foreach (self::$events[$name] as $i => $event) {
                if ($event[0] === $handler) {
                    unset(self::$events[$name][$i]);
                    $removed = true;
                }
            }
            if ($removed) {
                self::$events[$name] = array_values(self::$events[$name]);
            }

            return $removed;
        }
    }

    public static function trigger($name, $trigger = null)
    {
        if (empty(self::$events[$name])) {
            return;
        }
        $trigger === null && $trigger = new Trigger();
        $trigger->event = $name;
        foreach (self::$events[$name] as $handler) {
            $trigger->data = $handler[1];
            call_user_func($handler[0], $trigger);
            if ($trigger->handled) {
                return;
            }
        }
    }

    public static function get($name = null)
    {
        if (!empty($name)) {
            if (key_exists($name, self::$events)) {
                return self::$events[$name];
            } else {
                return false;
            }
        }

        return self::$events;
    }


    public static function has($name)
    {
        if (empty(self::$events[$name])) {
            return false;
        }
        return true;
    }

}