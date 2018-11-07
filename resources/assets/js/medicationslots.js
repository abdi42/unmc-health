function addMedication() {
    var index = $(`.medication`).length;
    var slotIndex = $(this).data("slotindex");

    var medications = $(this)
        .closest(".medications-container")
        .children(".medications");

    var container = $("<div></div>", {
        class: "col-6"
    });

    var row = $("<div></div>", {
        id: `medication${index}`,
        class: "row mb-0 mt-4 medication"
    });

    var input = $("<input/>", {
        type: "text",
        name: `slot[${slotIndex}][medication][${index}][name]`,
        placeholder: "Enter medication name here",
        class: "form-control",
        required: ""
    });

    var drugClass = $(`
        <div class="col-6 input-group">
            <input type="text" name="slot[${slotIndex}][medication][${index}][class]" data-index="0"
            placeholder="Enter class here"
            class="form-control" required>
        </div>    
    `);

    var inputGroup = $("<div></div>", {
        class: "input-group-append"
    });

    var button = $("<button>", {
        class: "btn btn-danger remove-medication",
        type: "button",
        "data-index": index
    }).click(removeMedication);

    var icon = $("<i>", {
        class: "fas fa-minus"
    });

    button.append(icon);
    inputGroup.append(button);
    container.append(input);
    drugClass.append(inputGroup);
    row.append(container, drugClass);

    medications.append(row);
}

function removeMedication() {
    var index = $(this).data("index");
    $(`#medication${index}`).remove();
}

function addSlot() {
    var index = $(`.medication`).length;
    var slotIndex = $(".card").length;

    var time = $(`
            <div class="col-3 p-0">
                <label for="medication_time" class="font-weight-bold">Medication Time</label>
                <div class="input-group">
                    <input type="time" name="slot[${slotIndex}][time]" placeholder="Enter your Medication time here"
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
            `);

    var nameInput = $(`
            <div class="col-7 p-0 m-0 medications">
                <div class="row">
                    <div class="col-6 medication">
                        <label for="medication_name" class="font-weight-bold">Medication Name</label>
                        <input type="text" name="slot[${slotIndex}][medication][${index}][name]" data-index="${index}"
                        placeholder="Enter medication name here"
                        class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label for="medication_class" class="font-weight-bold">Medication Class</label>
                      <input type="text" name="slot[${slotIndex}][medication][${index}][class]" data-index="${index}"
                             placeholder="Enter class here"
                             class="form-control" required>
                    </div>
                </div>
            </div>
            `);

    var addButton = $(`
            <button type="button" class="addMedication btn btn-link" data-slotindex="${slotIndex}">
                <i class="fas fa-plus"></i>
                Add Medication
            </button>
            `);

    addButton.click(addMedication);

    var buttonContainer = $(`
              <div class="col-3 align-self-end"></div>
            `).append(addButton);

    var card = $(`
                <div id="medication-time-${slotIndex}" class="card">
                    <div class="card-header" id="heading${slotIndex}">
                        <div class="mb-0">
                            <button class="col-11 btn btn-link text-left text-body" type="button" data-toggle="collapse"
                                    data-target="#collapse${slotIndex}" aria-expanded="true" aria-controls="collapse${slotIndex}">
                                Medication Slot
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

    card.find(".removeSlot").click(removeSlot);

    var medicationTime = $("<div></div>", {
        class: "row justify-content-center mt-2"
    });

    var medicationName = $("<div></div>", {
        class: "row justify-content-center my-4 medications-container"
    });

    medicationTime.append(time, dates);
    medicationName.append(nameInput, buttonContainer);

    card.find(".container:first").append(medicationTime, medicationName);

    $("#medications-accordion").append(card);
}

function removeSlot() {
    var index = $(this).data("slotindex");
    $(`#medication-time-${index}`).remove();
}

$(".addMedication").click(addMedication);
$("#addSlot").click(addSlot);
$(".removeSlot").click(removeSlot);
