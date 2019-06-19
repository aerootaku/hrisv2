<?php



namespace App\Http\Controllers;



use App\EmployeeLoan;

use Illuminate\Http\Request;

use App\Employee;

use App\SettingsConstants;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;



class EmployeeLoanController extends Controller

{



    public function index()

    {

        $data = DB::table('employee_loan as el')

            ->select('sc.value as loan_type','el.id as id','loan_type_id','firstname','lastname','el.employee_id','e.employee_no','total_amount','payable','payment_term','paid_amount','balance')

            ->join('employee as e', 'el.employee_id', '=', 'e.id')

            ->join('settings_constants as sc', 'el.loan_type_id', '=', 'sc.id')

            ->whereNull('el.deleted_at')

            ->get();



        $employee = Employee::all()->sortByDesc('lastname');

        $loan_type=SettingsConstants::all()->where('type', 'Loan Type')->sortByDesc('value');

        return view('Employee.loan', compact('data','employee','loan_type'));



    }



    public function store(Request $request)

    {

//        $balance = $request->input('amount');
//        $request->input($balance);

        EmployeeLoan::create($request->all());

        $notification = array(

            'message' => 'Employee Loan Created Successfully',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }


    public function update(Request $request, EmployeeLoan $employeeLoan)
    {
        EmployeeLoan::find($employeeLoan->id)->update($request->all());

        $notification = array(
            'message' => 'Employee Loan Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(EmployeeLoan $employeeLoan)

    {

        EmployeeLoan::find($employeeLoan->id)->delete();

        $notification = array(

            'message' => 'Employee Loan Deleted Successfully',

            'alert-type' => 'error'

        );

        return redirect()->back()->with($notification);

    }

}

