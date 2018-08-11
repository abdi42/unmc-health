<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">UNMC MHealth</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">




            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Subjects</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/subjects/create") }}">Add Subject</a></li>
                    <li><a href="{{ url("/subjects") }}">Show Subjects</a></li>

                </ul>
            </li>



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action Plan</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/actionplans/create") }}">Create Action Plan</a></li>
                    <li><a href="{{ url("/actionplans") }}">Show Action Plan</a></li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Medications</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/medicationslots/create") }}">Create Medication Time</a></li>
                    <li><a href="{{ url("/medicationslots") }}">Show Medication Times</a></li>
                    <li><a href="{{ url("/medicationnames/create") }}">Create Medication Name</a></li>
                    <li><a href="{{ url("/medicationnames") }}">Show Medication Names</a></li>

                </ul>
            </li>



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Education Content</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/contents/create") }}">Create Education Content</a></li>
                    <li><a href="{{ url("/contents") }}">Show Education Content</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Education Category</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/categories/create") }}">Create Education Category</a></li>
                    <li><a href="{{ url("/categories")}} ">Show Education Category</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reminders</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/reminders/create") }}">Create Reminder</a></li>
                    <li><a href="{{ url("/reminders") }}">Show Reminders</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Q&A</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/questions/create") }}">Create Question</a></li>
                    <li><a href="{{ url("/questions") }}">Show Questions</a></li>
                    <li><a href="{{ url("/answers/create") }}">Create Answer</a></li>
                    <li><a href="{{ url("/answers") }}">Show Answers</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">iHealth Data</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url("/subjects/ihealth") }}">iHealth IDs</a></li>
                    <li><a href="{{ url("/subjects/weight") }}">Weight</a></li>
                    <li><a href="{{ url("/subjects/bloodpressure") }}">Blood Pressure</a></li>
                    <li><a href="{{ url("/subjects/bloodglucose") }}">Blood Glucose</a></li>
                    <li><a href="{{ url("/subjects/pulseoxygen") }}">Pulse Oxygen</a></li>
                </ul>


            </li>




        </ul>
    </div>



</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


