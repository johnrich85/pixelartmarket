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

    /**
     * @param InputConfig $config
     */
    public function __construct(InputConfig $config) {
        $this->config = $config;
    }

    public function modify(\Illuminate\Database\Eloquent\Builder $builder, array $input) {

        $this->input = $input;
        $this->builder = $builder;
        $this->setConfigFilterableFields($builder);

        $this->builder = $this->addWhereFilters();
        $this->builder = $this->addSorting();
        $this->builder = $this->addFieldSelection();

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
        $modifier = new Modifiers\FilterModifier($this->input, $this->builder, $this->config);
        return $this->builder = $modifier->modify();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function addSorting() {
        $modifier = new Modifiers\SortModifier($this->input, $this->builder, $this->config);
        return $this->builder = $modifier->modify();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function addFieldSelection() {
        $modifier = new Modifiers\FieldSelectionModifier($this->input, $this->builder, $this->config);
        return $this->builder = $modifier->modify();
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