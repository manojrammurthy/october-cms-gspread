<?php namespace Google\Spreadsheet\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Google;

/**
 * Datasheets Back-end Controller
 */
class Datasheets extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Google.Spreadsheet', 'spreadsheet', 'datasheets');
    }

    public function apitest(){
        $googleClient = Google::getClient();
return print_r($googleClient,true);
    }

             /* Functions to allow RESTful actions */
    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
      $action = 'api' . ucfirst($method);
      if (method_exists($this, $action) && is_callable(array($this, $action)))
      {
        return call_user_func_array(array($this, $action), $parameters);
      } else {
        return response()->json([
            'message' => 'Not Found',
        ], 404);
      }
    }
}