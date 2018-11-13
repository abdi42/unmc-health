@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'Subjects' => '/subjects',
    'Create' => null
  ]
])


@section('content')

    <form action="/subjects" method="post">

        <title>Add Subject</title><br>

        <h3 class='sub-header'>Subject Info</h3>
        <div class="card mt-5">
            <div class="card-body">

                {{ csrf_field() }}
                <p>Enter Subject Code</p>
                <input type="text" name="id" placeholder="Enter your subject code here" class="form-control" required><br>


                <br><p>Enter your PIN </p>
                <input type="password" name="pin" placeholder="Enter your PIN here" class="form-control" required>

                <br><p>Select Disease(s) that apply</p>
                <input type="checkbox" name="disease[]"  value="Heart" checked="checked"> Heart Failure &nbsp;
                <input type="checkbox" name="disease[]"  value="HyperTension"> Hyper Tension &nbsp;
                <input type="checkbox" name="disease[]"  value="COPD"> COPD &nbsp;
                <input type="checkbox" name="disease[]"  value="Diabetes"> Diabetes &nbsp;<br>


                <br> <p>Select the intervention group for this subject:</p>
                <select name="group_type" id="group_type" class="form-control" required>
                    <option value="">Choose one</option>
                    <option value="1">{{App\Subject::GROUP_TYPE_1_TEXT}}</option>
                    <option value="2">{{App\Subject::GROUP_TYPE_2_TEXT}}</option>
                    <option value="3">{{App\Subject::GROUP_TYPE_3_TEXT}}</option>
                </select>
                <br>
                <div class="form-notes">
                    <em>Selecting the intervention group will determine the features available to the subject in the app.</em>
                </div>

                <br> <p>Virtual Visits</p>
                <input type="radio" name="virtualvisit"  value=1 checked="checked"> Yes &nbsp;
                <input type="radio" name="virtualvisit"  value=0> No &nbsp;<br>

                <br> <p>Enrollment Start Date</p>
                <input type="date" name="enrollmentdate"  id="enrollmentdate" class="form-control col-sm-2" value="date" required><br>

                <br> <p>Enrollment Stop Notifications Date</p>
                <input type="date" name="enrollment_end_notifications_date" id="enrollment_end_notifications_date" class="form-control col-sm-2" value="" required>
                <a href="javascript:auto_calculate_enrollment_end_date('enrollment_end_notifications_date','{{\App\Subject::ENROLLMENT_NOTIFICATION_DAYS}}' )" >Click here to auto-calculate +{{\App\Subject::ENROLLMENT_NOTIFICATION_DAYS}} days from enrollment</a>
                <br>
                <div class="form-notes">
                    <em>This date is used to disable subject reminders in the app. Not used for Group 1.</em>
                </div>

                <br> <p>Enrollment End Date</p>
                <input type="date" name="enrollment_end_date" id="enrollment_end_date" class="form-control col-sm-2" value="" required>
                <a href="javascript:auto_calculate_enrollment_end_date('enrollment_end_date','{{\App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS}}' )" >Click here to auto-calculate +{{\App\Subject::ENROLLMENT_LENGTH_DEFAULT_DAYS}} days from enrollment</a>
                <br>
                <div class="form-notes">
                    <em>This date is used to block subject access to the app.</em>
                </div>

            </div>
        </div>


        <div class="row mt-5">
            <div class="col-12 mt-2">
                <input type="submit" value="Submit" class="btn btn-success float-right  py-2 mx-3">
            </div>
        </div>


    </form>

@endsection
@push('scripts')
    <script type="text/javascript">
        function addMedication() {
            var slotIndex = $(this).data('slotindex')
            var index = $(`#collapse0 .medication`).length;

            var container = $("<div></div>", {
                id: `medication${index}`,
                class: "input-group col-12 mb-0 mt-4 medication"
            })

            var input = $("<input/>", {
                type: "text",
                name: `slot[${slotIndex}][medication_name][]`,
                plaecholder: "Enter medication name here",
                class: "form-control",
                required: ""
            })

            var inputGroup = $("<div></div>", {
                class: "input-group-append"
            })

            var button = $("<button>", {
                class: "btn btn-danger remove-medication",
                type: "button",
                "data-index": index
            }).click(removeMedication)

            var icon = $("<i>", {
                class: "fas fa-minus"
            })

            button.append(icon)
            inputGroup.append(button)
            container.append(input, inputGroup)

            console.log(container)

            $(`#collapse${slotIndex} .medications`).append(container)
        }

        function removeMedication() {
            var index = $(this).data('index');
            $(`#medication${index}`).remove();
        }


        function addSlot() {
            var slotIndex = $('.accordion .card').length;

            var time = $(`
            <div class="col-3">
                <label for="medication_time" class="font-weight-bold">Medication Time</label>
                <div class="input-group">
                    <input type="time" name="slot[][time]" placeholder="Enter your Medication time here"
                    class="form-control px-2 py-1" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-clock"></i>
                        </span>
                    </div>
                </div>
            </div>
            `);

            var dates = $(`
            <div class="col-7">
                <p class="col-12 font-weight-bold m-0 p-0">Select Day(s) to take medication : </p>
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label for="slot[${slotIndex}][day][sunday]" class="btn btn-outline-primary active my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][sunday]"
                               value="Sunday" checked> Sun
                    </label>
                    <label for="slot[${slotIndex}][day][monday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][monday]"
                               value="Monday"> Mon
                    </label>
                    <label for="slot[${slotIndex}][day][tuesday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][tuesday]"
                               value="Tuesday"> Tue
                    </label>
                    <label for="slot[${slotIndex}][day][wednesday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][wednesday]"
                               value="Wednesday"> Wed
                    </label>
                    <label for="slot[${slotIndex}][day][thursday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][thursday]"
                               value="Thursday"> Thu
                    </label>
                    <label for="slot[${slotIndex}][day][friday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][friday]"
                               value="Friday"> Fri
                    </label>
                    <label for="slot[${slotIndex}][day][saturday]" class="btn btn-outline-primary my-2">
                        <input type="checkbox" autocomplete="off" name="slot[${slotIndex}][day][saturday]"
                               value="Saturday"> Sat
                    </label>
                </div>
            </div>
            `)


            var nameInput = $(`
            <div class="col-7 p-0 m-0 medications">
                <div id="medication0" class="col-12 medication">
                    <label for="medication_name" class="font-weight-bold">Medication Name</label>
                    <input type="text" name="slot[${slotIndex}][medication_name][]" data-index="0"
                    placeholder="Enter medication name here"
                    class="form-control" required>
                </div>
            </div>
            `);

            var addButton = $(`
            <button id="addMedication" type="button" class="btn btn-link" data-slotindex="${slotIndex}">
                <i class="fas fa-plus"></i>
                Add Medication
            </button>
            `);

            addButton.data("slotIndex",slotIndex)
            addButton.click(addMedication)


            var buttonContainer =  $(`
              <div class="col-3 align-self-end"></div>
            `).append(addButton)


            var card = $(`
                <div id="medication-time-${slotIndex}" class="card">
                    <div class="card-header" id="heading${slotIndex}">
                        <div class="mb-0">
                            <button class="col-11 btn btn-link text-left text-body" type="button" data-toggle="collapse"
                                    data-target="#collapse${slotIndex}" aria-expanded="true" aria-controls="collapse${slotIndex}">
                                Slot #${slotIndex + 1}
                            </button>
                            <div class="col-1 float-right">
                                <button type="button" data-slotindex="${slotIndex}" class="removeSlot btn btn-danger">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="collapse${slotIndex}" class="collapse" aria-labelledby="heading${slotIndex}"
                         data-parent="#medications-accordion">
                        <div class="card-body">
                            <div class="container">
                            </div>
                        </div>
                    </div>
                </div>
            `);

            card.find('.removeSlot').click(removeSlot)

            var medicationTime = $('<div></div>',{
                class:"row justify-content-center mt-2"
            });

            var medicationName = $('<div></div>',{
                class:"row justify-content-center my-4"
            });


            medicationTime.append(time,dates)
            medicationName.append(nameInput,buttonContainer)

            card.find('.container:first').append(medicationTime,medicationName)

            $("#medications-accordion").append(card)
        }


        function removeSlot(){
            var index = $(this).data('slotindex');
            $(`#medication-time-${index}`).remove();
        }


        $('#addMedication').click(addMedication)
        $('#addSlot').click(addSlot)
        $(".removeSlot").click(removeSlot)







        function auto_calculate_enrollment_end_date(field_string,num_days) {
            var e = document.getElementById('enrollmentdate');
            var f = document.getElementById(field_string);
            var d = new Date(e.value);
            d.setDate(d.getDate() + parseInt(num_days));
            f.value = yyyy_mm_dd(d);

        }
        function yyyy_mm_dd(dateish) {
            var now = new Date(dateish);
            var y = now.getFullYear();
            var m = now.getMonth()+1;
            var d = now.getDate();
            return '' + y + "-" + (m < 10 ? '0' : '') + m + "-" + (d < 10 ? '0' : '') + d;
        }
    </script>

@endpush
