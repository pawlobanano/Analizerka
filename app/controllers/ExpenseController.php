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

        return View::make('expense.index')->with([
            'expenses'   => $expenses,
            'dataTables' => true
        ]);
    }


    /**
     * Show the form for creating a new expense.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        $today = (new DateTime())->format('d-m-Y');

        return View::make('expense.create')->with([
            'categories' => $categories,
            'today'      => $today,
            'dataTables' => false
        ]);
    }


    /**
     * Store a newly created expense in storage.
     *
     * @return Response
     */
    public function store()
    {
        $expValidator = Validator::make(Input::all(), Expense::$rules);

        // Expense part
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

                    // First scenario - there is a number of photos attached
                    $expense->save();

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

        // Second scenario - there is NO photo attached
        $expense->save();

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
        $expense = Expense::find($id);
        $images  = Image::whereHas('expense', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        // Change for view standard
        $expense->date  = date("d.m.Y", strtotime($expense->date));
        $expense->value = str_replace('.', ',', $expense->value);

        return View::make('expense.show')->with([
            'expense'    => $expense,
            'images'     => $images,
            'dataTables' => false
        ]);
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
        $images     = Image::whereHas('expense', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        // Change for view standard
        $expense->date = date("d-m-Y", strtotime($expense->date));

        return View::make('expense.edit')->with([
            'categories' => $categories,
            'expense'    => $expense,
            'images'     => $images,
            'dataTables' => false
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
        $expValidator = Validator::make(Input::all(), Expense::$rules);

        // Expense part
        if ($expValidator->fails()) {
            Session::flash('error', 'Something went wrong!');

            return Redirect::route('expense.edit', $id)->withErrors($expValidator);
        }

        $expense              = Expense::find($id);
        $expense->user_id     = Input::get('user_id');
        $expense->date        = new DateTime(Input::get('date'));
        $expense->category_id = Input::get('category_id');
        $value                = str_replace(',', '.', Input::get('value'));
        $expense->value       = number_format($value, 2, '.', '');;
        $expense->comment = Input::get('comment');

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

                return Redirect::route('expense.edit', $id)->withErrors($errorMessages);
            }

            // Loop through all uploaded images and save them
            foreach ($allImages as $file) {
                // Upload and save into database ONLY if all files passed validation
                if (count($allImages) == count($validFiles)) {

                    // Make directories and put there files
                    $folderName = str_random(12);
                    $fileName   = $file->getClientOriginalName();
                    $file->move(public_path('uploads/' . $folderName . '/'), $fileName);

                    // Second scenario - there is a number of photos attached
                    $expense->save();

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

        // First scenario - there is NO photo attached
        $expense->save();

        Session::flash('success', 'Successfully edited expense!');

        return Redirect::back();
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
        $images  = Image::whereHas('expense', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        if ($images) {
            foreach ($images as $image) {
                $uploadsPath = public_path() . '/uploads/';
                $fileName    = $image->name;
                $folderName  = $image->folder_name;
                $folder      = $uploadsPath . $folderName;
                $file        = $uploadsPath . $folderName . '/' . $fileName;

                File::delete($file);
                File::deleteDirectory($folder);

                if (File::exists($file)) {
                    Session::flash('error', 'Something went wrong with deleting your image!');

                    return Redirect::route('expense.index');
                }
            }
        }

        // We must wait till the related images check is done
        $expense->delete();

        Session::flash('success', 'Successfully deleted the expense!');

        return Redirect::route('expense.index');
    }
}
