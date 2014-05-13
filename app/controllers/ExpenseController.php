<?php

class ExpenseController extends BaseController
{

    /**
     * Display a listing of the expense.
     *
     * @return Response
     */
    public function index()
    {
        $expenses = Expense::with('category')->get();

        return View::make('expense.index', ['expenses' => $expenses]);
    }


    /**
     * Show the form for creating a new expense.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return View::make('expense.create', ['categories' => $categories]);
    }


    /**
     * Store a newly created expense in storage.
     *
     * @todo there is no image form input validation working right now!
     *
     * @return Response
     */
    public function store()
    {
        // Expense part
        $expValidator = Validator::make(Input::all(), Expense::$rules);

        if ($expValidator->fails()) {
            Session::flash('error', 'Something went wrong!');

            return Redirect::back()->withErrors($expValidator)->withInput();
        }

        $expense              = new Expense;
        $expense->user_id     = Input::get('user_id');
        $date                 = DateTime::createFromFormat('d-m-Y', Input::get('date'));
        $expense->date        = $date->format('Y-m-d'); // For the DB column standard
        $expense->category_id = Input::get('category_id');
        $value                = str_replace(',', '.', Input::get('value'));
        $expense->value       = number_format($value, 2, '.', '');
        $expense->comment     = Input::get('comment');
        $expense->save();

        // Image part
        if (Input::hasFile('image') && $expValidator->passes()) {

            $allImages = Input::file('image');

            // Make sure it really is an array
            if (!is_array($allImages)) {
                $allImages = [$allImages];
            }
            $errorMessages = [];
            $validFiles    = [];

            // Loop through all uploaded images and validate them
            foreach ($allImages as $file) {

                // Ignore array member if it's not an UploadedFile object, just to be extra safe
                if (!is_a($file, 'Symfony\Component\HttpFoundation\File\UploadedFile')) {
                    continue;
                }

                $imgValidator = Validator::make(
                    ['image' => $file],
                    Image::$rules
                );

                // isValid() = image successfully uploaded
                if ($file->isValid() && $imgValidator->passes()) {

                    // Make a list with a valid files
                    $validFiles[] = $file->getClientOriginalName();

                } else {
                    foreach ($imgValidator->messages()->all() as $key => $message) {
                        $errorFileName            = ($key > 0 ? "" : '\'' . $file->getClientOriginalName() . '\':<br>');
                        $errorMessages['image'][] = $errorFileName . '<p class="help-block">' . $message . '</p>';
                    }
                }
            }

            if (!empty($errorMessages)) {
                // Return, redirect with flash message
                Session::flash('error', 'Something went wrong with one of your image!');

                return Redirect::back()->withErrors($errorMessages)->withInput();
            }

            // Loop through all uploaded images and save them
            foreach ($allImages as $file) {
                // Upload and save into database ONLY if all files passed validation
                if (count($allImages) == count($validFiles)) {

                    // Make directories and put there files
                    $folderName = str_random(12);
                    $fileName   = $file->getClientOriginalName();
                    $file->move(public_path('uploads/' . $folderName . '/'), $fileName);

                    // Bring Image model with newly created Expense id and insert information to it!
                    $expenseId          = $expense->id;
                    $image              = new Image();
                    $image->expense_id  = $expenseId;
                    $image->folder_name = $folderName;
                    $image->name        = $fileName;
                    $image->save();
                }
            }
        }

        Session::flash('success', 'Successfully created expense!');

        return Redirect::route('expense.index');
    }


    /**
     * Display the specified expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
    }


    /**
     * Show the form for editing the specified expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'asc')->lists('name', 'id');
        $expense    = Expense::find($id);
        $image = Image::whereHas('expense', function($query) use ($id) {
            $query->where('id', $id);
        })->get();

//        dd($image[0]);

        // Change for view standard
        $expense->date = date("d-m-Y", strtotime($expense->date));

        return View::make('expense.edit', [
            'categories' => $categories,
            'expense'    => $expense
        ]);
    }


    /**
     * Update the specified expense in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), Expense::$rules);

        if ($validator->fails()) {
            Session::flash('error', 'Something goes wrong!');

            return Redirect::route('expense.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $expense              = Expense::find($id);
            $expense->user_id     = Input::get('user_id');
            $expense->date        = new DateTime(Input::get('date'));
            $expense->category_id = Input::get('category_id');
            $value                = str_replace(',', '.', Input::get('value'));
            $expense->value       = number_format($value, 2, '.', '');;
            $expense->comment = Input::get('comment');
            $expense->save();

            Session::flash('success', 'Successfully updated expense!');

            return Redirect::back()->withInput();
        }
    }


    /**
     * Remove the specified expense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        Session::flash('success', 'Successfully deleted the expense!');

        return Redirect::back();
    }


}
