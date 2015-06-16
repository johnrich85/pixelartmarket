<?php namespace Johnrich85\EloquentQueryModifier;

use Illuminate\Support\Facades\DB;

class InputConfig {

    /**
     * Name of the sort parameter.
     *
     * @var string
     */
    protected $sort = 'sort';

    /**
     * Name of the parameter containing
     * field names.
     *
     * @var string
     */
    protected $fields = 'fields';

    /**
     * Contains a list of fields to be filtered
     * against.
     *
     * @var array
     */
    protected $filterableFields = array();

    /**
     * The name of the limit parameter.
     * @var
     */
    protected $limit = 'limit';

    /**
     * The name of the page parameter.
     *
     * @var string
     */
    protected $page = 'page';

    /**
     * List of supported modifier objects.
     *
     * @var array
     */
    protected $modifiers = array(
        '\Johnrich85\EloquentQueryModifier\Modifiers\FieldSelectionModifier',
        '\Johnrich85\EloquentQueryModifier\Modifiers\FilterModifier',
        '\Johnrich85\EloquentQueryModifier\Modifiers\SortModifier',
        '\Johnrich85\EloquentQueryModifier\Modifiers\PagingModifier'
    );

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }


    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return string
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param string $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return array
     */
    public function getFilterableFields()
    {
        return $this->filterableFields;
    }

    /**
     * @return array
     */
    public function getModifiers() {
        return $this->modifiers;
    }

    /**
     * @param $modifierName
     */
    public function addModifier($modifierName) {
        $this->modifiers[] = $modifierName;
    }

    /**
     * @param array $filterableFields
     */
    public function setFilterableFields(\Illuminate\Database\Eloquent\Builder $builder)
    {
        $table = $builder->getModel()->getTable();
        $columns = DB::select(DB::raw('SHOW COLUMNS FROM ' . $table));
        $fields = array();

        foreach($columns as $col){
            $this->filterableFields[$col->Field] = $col->Field;
        }
    }
}