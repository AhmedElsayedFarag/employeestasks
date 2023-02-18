<?php


namespace App\Actions;


use Illuminate\Http\Request;

class DataTable extends Action
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request)
    {
        // Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        // Total records
        $totalRecords = $this->model->select('count(*) as allcount')->count();

        $totalRecordswithFilter = $this->model->select('count(*) as allcount')
            ->where('text', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = $this->model->orderBy($columnName, $columnSortOrder)
            ->where('tasks.text', 'like', '%' . $searchValue . '%')
            ->select('tasks.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $text = $record->text;
            $manager = $record->manager->name ?? '';
            $employee = $record->employee->name ?? '';
            $status = $record->status;
            $options = '';
            if (auth()->user()->hasPermissionTo('update tasks')) {
                $options .= '<a href="' . route('tasks.edit', $record->id) . '" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i></a>';
            }
            if (auth()->user()->hasPermissionTo('delete tasks')) {
                $options .= '                                                                                        <a onclick="fireDeleteEvent('.$record->id.')" type="button"
                                                                                           class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>
                                                                                        <form action="'.route('tasks.destroy',$record->id).'" method="POST"
                                                                                              id="form-'.$record->id.'">
                                                                                            '.csrf_field().'
                                                                                            '.method_field('DELETE').'
                                                                                        </form>';
            }

            $data_arr[] = array(
                'id' => $id,
                'text' => $text,
                'manager' => $manager,
                'employee' => $employee,
                'status' => $status,
                'options' => $options
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return json_encode($response);
    }


}
