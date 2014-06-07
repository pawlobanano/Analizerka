## 'Analizerka' / Personal finance analyzer
Available @ **[Analizerka / Personal finance analyzer](http://analizerka.glt.pl)**

### O co chodzi?  / What is it?
Project which helps carrying personal finance. Made with intention to improve and eventually displace 'the spreadsheet' way of finance conducting.

### Co działa / What is working
**Routes - features available** (*estimated % done*)

* / (main landing page) ( ~50% )
* /budget (create, read, update, delete) + validation ( 0% )
* /categories (create, read, update, delete) + validation ( 0% )
* /expense (create, read, update, delete) + photos (create, delete) + validation (for both) ( 99.89% )
* /monthly-incomes (create, read, update, delete) + validation ( 0% )

### Co pozostaje do zrobienia / What's more to implement
**Features to implement**

* ~~Insert and manipulate expense~~
* ~~Attach photo to expense _(there might be many - Woo Hoo!)_~~
* ~~Add show page for a single expense~~
* ~~Include Images (CD from CRUD) in edit Expense form~~
* ~~One place to rule them all... a dashboard landing page with some bootstrap graphic~~
* Categories management (associated colors maybe?; CRUD)
* Monthly income management (with summarized expenses and balance; all in one place; 'click on' - to edit; CRUD)
* **Fancy charts** (to present stored financial data)
    * Categories
        Donut chart
    * Budget
        Bar chart (with animated background as a time representation)
    * Months
        Line (mixed) chart (with budget)
    * Days
        Line (mixed) chart (with mean)
    * All-time expenses
        Line (mixed) chart
* History (divided by: days, months, years; with summarized expenses)
* More users (register, login, logout)

And more... any thoughts?

### Problemy do rozwiązania / Problems to solve
* **Prepare SQL queries** for required charts and other data representations
* Moving menu button all to the right on mobile devices (button .navbar-toggle)
* ~~Expense - on delete - delete related images~~
* ~~Find **a way to stop upload** those images which passed their validation, when one of selected is not passed through its validation *(create Expense formular)*~~

###License
Licensed under [MIT license](http://opensource.org/licenses/MIT)
