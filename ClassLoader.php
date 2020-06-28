<?php


class ClassLoader
{

    private $classMap = [];

    public function register($prepend = false)
    {
        spl_autoload_register([$this, 'autoload'], true, $prepend);
    }

    public function autoload($class)
    {
        if ($file = $this->findFile($class)) {
            include $file;
        }
    }

    public function findFile($class)
    {
        if (isset($this->classMap[$class])) {
            return $this->classMap[$class];
        }

        $file = $this->findFileWithExtension($class, '.php');

        return $file;
    }

    private function findFileWithExtension($class, $ext)
    {
        $logicalPath = strtr($class, '\\', DIRECTORY_SEPARATOR) . $ext;
        if (file_exists($file = __DIR__ . DIRECTORY_SEPARATOR . $logicalPath)) {
            return $file;
        }

        return false;
    }

}