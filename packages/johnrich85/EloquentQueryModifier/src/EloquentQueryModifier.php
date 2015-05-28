<?php namespace Johnrich85\EloquentQueryModifier;

class EloquentQueryModifier implements QueryModifier {

    /**
     * @var InputConfig
     */
    protected $config;

    /**
     * @var array
     */
    protected $input = array();

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    public function __construct(InputConfig $config) {
        $this->config = $config;
    }

    public function modify(\Illuminate\Database\Eloquent\Builder $builder, array $input) {

        $this->input = $input;
        $this->builder = $builder;

        $this->setConfigFilterableFields($builder);

        $this->builder = $this->addWhereFilters();

    }

    /**
     * Retrieves the fields for a model &
     * assigns to the config.
     *
     * @param $builder
     */
    protected function setConfigFilterableFields(\Illuminate\Database\Eloquent\Builder $builder) {
        $this->config->setFilterableFields($builder);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function addWhereFilters() {
        $fields = $this->config->getFilterableFields();

        if(count($fields) == 0) {
            return $this->builder;
        }

        $fieldsAdded = 0;

        foreach($fields as $field) {
            if(empty($this->input[$field])) continue;

            if($fieldsAdded > 0) {
                $this->builder = $this->builder->orWhere($field, $this->input[$field]);
            }else {
                $this->builder = $this->builder->where($field, $this->input[$field]);
            }
            $fieldsAdded++;
        }

        return $this->builder;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param mixed $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
    }

}

interface QueryModifier {
    public function modify(\Illuminate\Database\Eloquent\Builder $builder, array $input);
}