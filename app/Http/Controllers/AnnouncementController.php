<?php



namespace App\Http\Controllers;

use App\Announcement;

use App\department;

use App\Employee;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;



class AnnouncementController extends Controller

{

    //TODO: RE IMPLMENT THE ANNOUNCEMENT SECTION THAT IS DIVDED PER LOCATION / BRANCH SPECIFIC
    public function index()

    {

        $data = DB::table('announcements')
            ->select('announcements.id as id','department_name','firstname','lastname','employee.employee_no','announcements.created_by','department','location','summary','title','start_date','end_date','description')
            ->join('employee', 'announcements.created_by', '=', 'employee.id')
            ->join('company_department', 'announcements.department', '=', 'company_department.id')
            ->whereNull('announcements.deleted_at')
            ->get();



        $employee = Employee::all()->sortByDesc('lastname');

        $department = Department::all()->sortByDesc('department_name');

        return view('Company.announcement', compact('data','department','employee'));

    }



    public function store(Request $request)

    {

        Announcement::create($request->all());

        $notification = array(

            'message' => 'Announcement Created Successfully',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }



    public function update(Request $request, Announcement $announcement)

    {

        Announcement::find($announcement->id)->update($request->all());

        $notification = array(

            'message' => 'Announcement Updated Successfully',

            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);

    }



    public function destroy(Announcement $announcement)

    {

        Announcement::find($announcement->id)->delete();

        $notification = array(

            'message' => 'Announcement Deleted Successfully',

            'alert-type' => 'error'

        );

        return redirect()->back()->with($notification);

    }



    public function edit(Announcement $attendance)

    {

        //

    }



    public function show(Announcement $attendance)

    {

        //

    }



    public function create()

    {

        //

    }



}

