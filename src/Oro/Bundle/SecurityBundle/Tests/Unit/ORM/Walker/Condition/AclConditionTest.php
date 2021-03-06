<?php
namespace Oro\Bundle\SecurityBundle\Tests\Unit\ORM\Walker\Condition;

use Doctrine\ORM\Query\AST\PathExpression;

use Oro\Bundle\SecurityBundle\ORM\Walker\Condition\AclCondition;

class AclConditionTest extends \PHPUnit_Framework_TestCase
{
    public function testAclCondition()
    {
        $condition = new AclCondition('testClass', 'id', array(1));
        $this->assertEquals('testClass', $condition->getEntityAlias());
        $this->assertEquals('id', $condition->getEntityField());
        $this->assertEquals(array(1), $condition->getValue());
        $condition->setEntityAlias('anotherClass');
        $condition->setEntityField('owner');
        $condition->setValue(array(2));
        $this->assertEquals('anotherClass', $condition->getEntityAlias());
        $this->assertEquals('owner', $condition->getEntityField());
        $this->assertEquals(array(2), $condition->getValue());
        $this->assertEquals(PathExpression::TYPE_SINGLE_VALUED_ASSOCIATION, $condition->getPathExpressionType());
        $condition->setPathExpressionType(PathExpression::TYPE_COLLECTION_VALUED_ASSOCIATION);
        $this->assertEquals(PathExpression::TYPE_COLLECTION_VALUED_ASSOCIATION, $condition->getPathExpressionType());
    }
}
