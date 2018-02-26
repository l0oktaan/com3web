<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EditorRequest as StoreRequest;
use App\Http\Requests\EditorRequest as UpdateRequest;

class EditorCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Editor');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/editor');
        $this->crud->setEntityNameStrings('editor', 'editors');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');
        $this->crud->addField([
            'name' => 'name',
            'label' => "Editor Name",
            'type' => 'text'
        ]);
        

       
        $this->crud->addField([
            'label' => "Department",
            'type' => 'select',
            'name' => 'depart_id', 
            'entity' => 'depart',
            'attribute' => 'name',
            'model' => "App\Models\Depart"
        ]);

        $this->crud->addField([
            'name' => 'idcard',
            'label' => "ID Card",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'username',
            'label' => "Username",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name'        => 'type', // the name of the db column
            'label'       => 'type', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                1 => "e-Office",
                2 => "Inter/Intra"
            ],
            'inline'      => true,
        ]);
        $this->crud->addField([
            'name' => 'job',
            'label' => "Job",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'contact',
            'label' => "Contact",
            'type' => 'text'
        ]);
        
        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        
        $this->crud->addColumn([
            'label' => "Department",
            'type' => 'select',
            'name' => 'depart_id', 
            'entity' => 'depart',
            'attribute' => 'name',
            'model' => "App\Models\Depart"
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Editor Name",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'username',
            'label' => "Username",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name'        => 'type', // the name of the db column
            'label'       => 'type', // the input label
            'type'        => 'radio',
            'options'     => [ // the key will be stored in the db, the value will be shown as label; 
                1 => "e-Office",
                2 => "Inter/Intra"
            ],
             // show the radios all on the same line?
        ]);
        $this->crud->addColumn([
            'name' => 'job',
            'label' => "Job",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'contact',
            'label' => "Contact",
            'type' => 'text'
        ]);
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        // ------ FILTERS
        $this->addCustomCrudFilters();
    }

    

    public function addCustomCrudFilters()
    {
        $this->crud->addFilter([ // add a "simple" filter called Draft
          'type'  => 'simple',
          'name'  => 'checkbox',
          'label' => 'Checked',
        ],
        false, // the simple filter has no values, just the "Draft" label specified above
        function () { // if the filter is active (the GET parameter "draft" exits)
            $this->crud->addClause('where', 'checkbox', '1');
        });

        

        $this->crud->addFilter([ // text filter
          'type'  => 'text',
          'name'  => 'name',
          'label' => 'Editor Name',
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'name', 'LIKE', "%$value%");
        });

        $this->crud->addFilter([ // select2_ajax filter
            'name' => 'depart_id',
            'type' => 'select2',
            'label'=> 'Depart'
        ], function() {
            foreach(\App\Models\Depart::get() AS $k=>$v){
                $res[$v->id] = $v->name;
            }
            return($res);
            return \App\Models\Depart::get()->keyBy('id')->pluck('name');
        });

        $this->crud->addFilter([ // dropdown filter
            'name' => 'type',
            'type' => 'dropdown',
            'label'=> 'Type'
          ], [
            1 => 'e-Office',
            2 => 'Inter/Intranet',            
          ], function($value) { // if the filter is active
              $this->crud->addClause('where', 'type', $value);
          });
          
    }
    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
