<?php ;
use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;
use Johnrich85\EloquentQueryModifier\Modifiers\FieldSelectionModifier;
use Illuminate\Support\Facades\DB;

class FieldSelectionModifierTest extends DbTestCase {

    protected $config;
    protected $builder;
    protected $data;

    public function testCheckForInvalidFields() {
        $modifier = $this->_getInstance();

        $this->config->expects($this->any())
            ->method('getFilterableFields')
            ->will($this->returnValue(array(
                    'name' => 'name',
                    'description' => 'description'
                )
            ));

        $fields = array(
            'name',
            'description'
        );
        $method = self::getMethod('checkForInvalidFields');
        $result = $method->invokeArgs($modifier, array($fields));

        $this->assertEquals(false, $result);
    }

    public function testCheckForInvalidFieldsThrowsException() {
        $modifier = $this->_getInstance();

        $this->config->expects($this->any())
            ->method('getFilterableFields')
            ->will($this->returnValue(array(
                    'name' => 'name',
                    'description' => 'description'
                )
            ));

        $fields = array(
            'name',
            'invalidField'
        );

        $this->setExpectedException('Exception');

        $method = self::getMethod('checkForInvalidFields');
        $method->invokeArgs($modifier, array($fields));
    }

    public function testFetchValuesFromData() {
        $modifier = $this->_getInstance();

        $this->config->expects($this->any())
            ->method('getFields')
            ->will($this->returnValue('fields'));

        $method = self::getMethod('fetchValuesFromData');
        $result = $method->invokeArgs($modifier, array());

        $this->assertEquals('name, description' ,$result);
    }

    public function testFetchValuesFromDataWithoutData() {
        $modifier = $this->_getInstance();

        $this->config->expects($this->any())
            ->method('getFields')
            ->will($this->returnValue('non_existent_index'));

        $method = self::getMethod('fetchValuesFromData');
        $result = $method->invokeArgs($modifier, array());

        $this->assertEquals(false ,$result);
    }

    public function testModifyCallsSelect() {
        $modifier = $this->_getInstance();

        $data = array(
            'name' => 'name',
            'description' => 'description'
        );

        $this->config->expects($this->any())
            ->method('getFields')
            ->will($this->returnValue('fields'));

        $this->config->expects($this->any())
            ->method('getFilterableFields')
            ->will($this->returnValue($data));

        $this->builder->expects($this->atLeastOnce())
            ->method('__call')
            ->with($this->equalTo('select'),$this->anything())
            ->will($this->returnValue(true));

        $method = self::getMethod('modify');
        $method->invokeArgs($modifier, array());
    }

    protected function _getInstance() {
        $this->data = array(
            'fields' => 'name, description'
        );
        $this->config = $this->getMock('\Johnrich85\EloquentQueryModifier\InputConfig');
        $this->builder = $this->getMockBuilder('\Illuminate\Database\Eloquent\Builder')
            ->disableOriginalConstructor()
            ->getMock();


        return new FieldSelectionModifier($this->data, $this->builder, $this->config);
    }

    protected static function getMethod($name) {
        $class = new ReflectionClass('\Johnrich85\EloquentQueryModifier\Modifiers\FieldSelectionModifier');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function setUp() {
        parent::setUp();
    }

    public function getBasePath() {
        return realpath(__DIR__.'/../../../../');
    }

    /**
     * Rollback transactions after each test.
     */
    public function tearDown() {
        \Mockery::close();
        parent::tearDown();
    }
}
