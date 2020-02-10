<?php

/**
 * Класс Одиночка предоставляет метод `GetInstance`, который ведёт себя как
 * альтернативный конструктор и позволяет клиентам получать один и тот же
 * экземпляр класса при каждом вызове.
 */
class MyCookie //sinlgleton
{
    private static ?MyCookie $instance = null; //static means that the variable is a member of the class itself (only one copy) rather than a member of objects of the class (one per object). You can access a static variable without having an object. In this case you can call Class.getInstance() to get the single Connection_Class object shared by the whole program.

    public static function getInstance(): MyCookie
    {
        if (static::$instance === null) {
            // Позднее статическое связывание (PHP 5.3+)
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Make constructor private, so nobody can call "new Class".
     */
    private function __construct()
    {
    }

    /**
     * Make clone magic method private, so nobody can clone instance.
     */
    private function __clone()
    {
    }

    /**
     * Make sleep magic method private, so nobody can serialize instance.
     */
    private function __sleep()
    {
    }

    /**
     * Make wakeup magic method private, so nobody can unserialize instance.
     */
    private function __wakeup()
    {
    }

    public static function getCookie($key)
    {
        return $_COOKIE[$key] ?? null;
    }

    public static function setCookie($key, $value, $time = 31622400)
    {
        if (!isset($_COOKIE[$key])) {
            setcookie($key, $value, time() + $time, '/');
        }

    }

    public static function deleteCookie($key)
    {
        if (isset($_COOKIE[$key])) {
            //self::getCookie($key);
            setcookie($key, "", time() - 3600, '/');
            unset($_COOKIE[$key]);
        }
    }

    public static function updateCookie($key, $value, $time = 31622400)
    {
        if (isset($_COOKIE[$key])) {
            setcookie($key, $value, time() + $time, '/');
        }
        return null;
    }

}