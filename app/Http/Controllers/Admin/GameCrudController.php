<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GameRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GameCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GameCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Game::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/game');
        CRUD::setEntityNameStrings('game', 'games');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        $this->crud->modifyColumn('manufacturer_id', [
            'type' => 'select',
            'label' => 'Manufacturer',
            'entity' => 'manufacturer',
            'attribute' => 'name',
            'model' => 'App\Models\Manufacturer'
        ]);

        $this->crud->modifyColumn('cover', [
            'label' => "Cover Art",
            'name' => "cover",
            'type' => 'view',
            'view' => 'vendor.backpack.crud.columns.cover_art',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */

        $this->crud->modifyColumn('manufacturer_id', [
            'type' => 'select',
            'label' => 'Manufacturer',
            'entity' => 'manufacturer',
            'attribute' => 'name',
            'model' => 'App\Models\Manufacturer'
        ]);

        $this->crud->modifyColumn('cover', [
            'label' => "Cover Art",
            'name' => "cover",
            'type' => 'view',
            'view' => 'vendor.backpack.crud.columns.cover_art',
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        // CRUD::setValidation(GameRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */

        CRUD::setValidation(GameRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Game Name'
        ]);

        CRUD::addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Description',
            "escaped" => false
        ]);
    
        CRUD::addField([
            'name' => 'release_date',
            'type' => 'date',
            'label' => 'Release Date'
        ]);
    
        // Manufacturer Relationship
        CRUD::addField([
            'name' => 'manufacturer_id',
            'type' => 'select',
            'label' => 'Manufacturer',
            'placeholder' => 'Select a manufacturer'
        ]);
    
        CRUD::addField([
            'name' => 'genres',
            'type' => 'select_multiple',
            'label' => 'Genres',
            'entity' => 'genres',
            'attribute' => 'name',
            'model' => "App\Models\Genre"
        ]);

        CRUD::addField([
            'name' => 'rating',
            'type' => 'number',
            'label' => 'Rating',
            'attributes' => ["step" => "1", "min" => "1", "max" => "5"]
        ]);

        $this->crud->addField([
            'label' => "Cover Art",
            'name' => "cover",
            'type' => 'upload',
            'upload' => true,
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
