<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;
use App\GridLink;


use Grids;
use Html;
use Illuminate\Support\Facades\Config;
use Nayjest\Grids\Components\Base\RenderableRegistry;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\CsvExport;
use Nayjest\Grids\Components\ExcelExport;
use Nayjest\Grids\Components\Filters\DateRangePicker;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\Laravel5\Pager;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\RecordsPerPage;
use Nayjest\Grids\Components\RenderFunc;
use Nayjest\Grids\Components\ShowingRecords;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\Components\TotalsRow;
use Nayjest\Grids\DbalDataProvider;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;
use Nayjest\Grids\SelectFilterConfig;


class AdminController extends Controller
{
        public function __construct()
    {
    	$this->middleware('auth:admin');
    }


    public function showCustomers(){

       
    	return view('admin/customers/admin-customers');
    }


    public function showDashboard(){
		return view('admin/dashboard/admin-dashboard');
	}


	public function showOrders(){
    	return view('admin/orders/admin-orders');
    }


    public function showProducts(){
    	return view('admin/products/admin-products');
    }

    public function showPermissions(Request $request){

        $request->user()->authorizeRoles('admin');

        $options=array('active'=>'Active','inactive'=>'Inactive');


        // $query = (new Admin)
        //          ->newQuery();

      $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Admin::query())
                )
                ->setName('users-grid')
                ->setPageSize(15)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('name')
                        ->setLabel('Name')

                        ->setSortable(true)
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,
                    (new FieldConfig)
                        ->setName('email')
                        ->setLabel('Email')
                        ->setSortable(true)
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,


                    (new FieldConfig)
                        ->setName('username')
                        ->setLabel('Username')
                        ->setSortable(true)
                        ->addFilter(
                            (new FilterConfig)
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                    ,

                    (new FieldConfig)
                        ->setName('status')
                        ->setLabel('Status')
                        ->addFilter(
                            (new SelectFilterConfig)
                                ->setName('status')
                                ->setSubmittedOnChange(true)
                                ->setOptions($options)
                            )

                    ,

                ])


            ->setComponents([
                    (new THead)
                        ->setComponents([
                            (new ColumnHeadersRow),
                            (new FiltersRow)
                                ->addComponents([
                                    (new RenderFunc(function () {
                                         return HTML::style('admin/css/style.css');
                                    }))
 
                                ])
                            ,
                            (new OneCellRow)
                                ->setRenderSection(RenderableRegistry::SECTION_END)
                                ->setComponents([
                                    new RecordsPerPage,
                                    (new HtmlTag)
                                        ->setContent('<span class="glyphicon glyphicon-refresh"></span> Filter')
                                        ->setTagName('button')
                                        ->setRenderSection(RenderableRegistry::SECTION_END)
                                        ->setAttributes([
                                            'class' => 'btn user-grid-btn btn-sm'
                                        ])
                                ])
                        ])
                    ,

                ])

             ->setRowComponent(new GridLink())

        

            );


           

             $grid = $grid->render();        



        
       return view('admin/permissions/admin-permissions', compact('grid'));        

    }

    public function showUserForm (){

        return view('admin/permissions/admin-createuser');
    }


    public function showUserDetail($id){

        return $id;

    }
}

