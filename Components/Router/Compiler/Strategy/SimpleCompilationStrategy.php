<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 2:58 PM
 */

namespace Framework\Components\Compiler\Strategy;


use Framework\Components\CompiledRouteBuilder\CompiledRouteBuilder;
use Framework\Components\Router\CompiledRoute;

class SimpleCompilationStrategy extends AbstractCompilationStrategy implements CompilationStrategyInterface
{

    public function compile(CompiledRouteBuilder $builder) : CompiledRoute
    {
        $pathInfo = $this->request->getPathInfo();
        $requestedPathParts = explode('/', substr($this->route->getMappedPath(), 1));

        $builder = $builder->calledClass($requestedPathParts[0]);

        if (preg_match('#\[#', $requestedPathParts[1])) {
            preg_match_all('#^(.*)(\[(.+)\]).*#ui', $requestedPathParts[1], $matches);

            $builder = $builder->calledMethod($matches[1][0]);
            $methodSignature = (!empty($matches[3][0])) ? explode(',', str_replace(' ', '', $matches[3][0])) : [];
            $describedPath = $this->route->getUriPath();

            preg_match_all("#.*<:(.+)\s*\*{1}.*>.*#Ui", $describedPath, $matches);

            $describedPathArgs = $matches[1];
            $pathInfoArray = explode('/', substr($pathInfo, 1));
            array_shift($pathInfoArray);

            $describedParts = explode('/', substr($describedPath, 1));
            array_shift($describedParts);

            $describedParts = array_values($describedParts);

            foreach ($describedParts as $key => $part) {
                if (!preg_match("#.*<:(.+)\s*\*{1}.*>.*#Ui", $part)) {
                    unset($pathInfoArray[$key]);
                }
            }

            $pathInfoArray = array_values($pathInfoArray);

            $arguments = [];

            foreach ($methodSignature as $signaturePosition => $signatureArg) {
                foreach ($describedPathArgs as $describedPosition => $describedPathArg) {
                    if ($signatureArg == $describedPathArg) {
                        if (!empty($pathInfoArray[$describedPosition])) {
                            $arguments[] = $pathInfoArray[$describedPosition];
                        }
                    }
                }
            }

            $builder = $builder->arguments($arguments);

        } else {

            $builder = $builder->calledMethod($requestedPathParts[1]);

        }

        return new CompiledRoute($builder);

    }
}