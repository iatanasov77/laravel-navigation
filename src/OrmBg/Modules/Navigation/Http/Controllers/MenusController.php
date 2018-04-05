<?php namespace OrmBg\Modules\Navigation\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use OrmBg\Core\CRUD\ResourceController;
use OrmBg\Modules\Navigation\Facade as Navigation;
use Illuminate\Http\Request;
use OrmBg\Modules\UserManagement\Entities\Permission;

class MenusController extends ResourceController
{


    public function create( Request $request )
    {
        return parent::create( $request )->with([
            'permissions' => Permission::pluck( 'name', 'name' )
        ]);
    }

    public function edit( $id, $locale = null )
    {
        return parent::edit( $id, $locale )->with([
            'permissions' => Permission::pluck( 'name', 'name' )
        ]);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function preSave( Request $request, Model &$entity, array &$input )
    {
        parent::preSave( $request, $entity, $input );

        $input['required_all']   = isset( $input['required_all'] ) ? true : false;
    }

    protected function postSave( Model &$entity, array $input )
    {
        parent::postSave( $entity, $input );

        Navigation::build( $entity );
    }
}
