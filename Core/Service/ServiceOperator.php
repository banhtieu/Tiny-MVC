<?php
/**
 * Created by PhpStorm.
 * User: banht_000
 * Date: 5/18/2015
 * Time: 6:37 PM
 */

namespace Core\Service;


/**
 * Class ServiceOperator
 * Contains meta-data of a service operator
 * @package Core\Service
 */
class ServiceOperator {

    /**
     * @var the class name
     */
    public $className;

    /**
     * @var the method name
     */
    public $methodName;

    /**
     * @var the route mapping
     */
    public $route;

    /**
     * @var string HTTP Method
     */
    public $httpMethod;

    /**
     * @var array
     */
    public $parameters = array();


    /**
     *
     * initialize the class
     * @param $basePath
     * @param $className
     * @param $method \ReflectionMethod
     */
    public function __construct($basePath, $className, $method) {
        $this->className = $className;
        $this->methodName = $method->getName();
        $this->route = $basePath;

        $this->parse($method);
    }

    /**
     * Parse another content from $document
     * @param $method \ReflectionMethod
     */
    private function parse($method){
        $document = $method->getDocComment();

        preg_match("/@(?P<method>(get|post|delete|head|put))\\((?P<path>[^)]+)\\)/",
            $document, $match);

        if (sizeof($match) > 0) {

            $this->route .= $match["path"];
            $this->httpMethod = $match["method"];

            preg_match_all("/@param \\$(?P<name>[^\\s]+)\\s+[^#]+#(?P<type>[^\\s]+).*\\n/", $document, $matches);

            $numberOfParams = sizeof($matches[0]);
            $params = $method->getParameters();


            for ($i = 0; $i < $numberOfParams; $i++) {
                $parameterName = $matches["name"][$i];
                $parameterType = $matches["type"][$i];

                $param = $params[$i];
                $defaultValue = null;

                if ($param->isDefaultValueAvailable()) {
                    $defaultValue = $param->getDefaultValue();
                }

                $parameterInfo = new ServiceParameter($parameterName, $parameterType, $defaultValue);
                $this->parameters[] = $parameterInfo;
            }
        }
    }
}