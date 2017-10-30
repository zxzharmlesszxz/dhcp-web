<?php
/**
 * Created by PhpStorm.
 * User: harmless
 * Date: 10.05.17
 * Time: 14:43
 */

namespace Core;

use Core\Interfaces\ThemeInterface;

/**
 * Class Theme
 * @package Core
 */
abstract class Theme implements ThemeInterface
{
    /**
     * @var array
     */
    protected $styles = array();

    /**
     * @var array
     */
    protected $lesses = array();

    /**
     * @var array
     */
    protected $jscripts = array();

    /**
     * @var
     */
    protected $content;

    /**
     * @var string
     */
    protected $dir;

    /**
     * Theme constructor.
     */
    public function __construct()
    {
        //echo get_called_class() . " theme<br />";
        $this->dir = dirname((new \ReflectionClass($this))->getFileName());
        foreach ($this->findFiles('style') as $file)
            $this->setStyle($file);
        foreach ($this->findFiles('less') as $file)
            $this->setLess($file);
        foreach ($this->findFiles('js') as $file)
            $this->setJscript($file);

        $this->content = "";
    }

    /**
     * @param mixed $style
     * @return mixed|void
     */
    public function setStyle($style)
    {
        $this->styles[] = $style;
    }

    /**
     * @param mixed $script
     * @return mixed|void
     */
    public function setJscript($script)
    {
        $this->jscripts[] = $script;
    }

    /**
     * @param mixed $less
     * @return mixed|void
     */
    public function setLess($less)
    {
        $this->lesses[] = $less;
    }

    /**
     * @return mixed
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @return mixed
     */
    public function getJscripts()
    {
        return $this->jscripts;
    }

    /**
     * @return mixed
     */
    public function getLesses()
    {
        return $this->lesses;
    }

    /**
     * @param $content
     * @return View
     */
    public function generate($content)
    {
        $this->content = $content;
        #$this->content .= serialize(Core::getInstance()->Session);
        $output= new View();
        print_r($output->generate($this, $this->content));
    }

    /**
     * @param $dir
     * @return mixed
     */
    public function findFiles($dir)
    {
        $path = dir($this->dir . '/' . $dir);
        $parsedpath = explode('/', $this->dir);
        $webpath = "/Application/Theme/" . end($parsedpath);
        $files = array();
        while (false !== ($file = $path->read())) {
            switch ($file) {
                case '.':
                case '..':
                    break;
                default:
                    $files[] = "$webpath/$dir/$file";
                    break;
            }
        }
        return $files;
    }
}