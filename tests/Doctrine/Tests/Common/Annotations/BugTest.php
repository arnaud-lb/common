<?php

namespace Doctrine\Tests\Common\Annotations;

use Doctrine\Common\Annotations\Annotation\IgnorePhpDoc;
use Doctrine\Common\Annotations\Annotation\IgnoreAnnotation;
use Doctrine\Common\Annotations\DocParser;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\Annotation\Target;

class BugTest extends \PHPUnit_Framework_TestCase
{
    public function testParseWithAnnotationInterfaceInNamespace()
    {
        $parser = new DocParser();
        $parser->setIgnoreNotImportedAnnotations(true);
        $parser->setImports(array(
            '__NAMESPACE__' => 'Doctrine\Tests\Common\Annotations\Fixtures\Bug',
        ));

        $this->assertTrue(interface_exists('Doctrine\Tests\Common\Annotations\Fixtures\Bug\Annotation'));

        $parser->parse('@Annotation');
    }
}

