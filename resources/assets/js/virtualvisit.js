function removeVisit() {
    const index = $(this).data("index");
    console.log(index);
    $(`#visit-${index}`).remove();
}

function addVisit() {
    const index = $(`.card`).length;

    const button = $(`
        <button type="button" class="removeVisit btn btn-link" data-index="${index}">
          <i class="fas fa-times text-danger"></i>
        </button>
      `);

    button.click(removeVisit);

    const buttonContainer = $(`
        <div class="col-1 float-right"></div>
      `);

    buttonContainer.append(button);

    const cardHeader = $(`
        <div class="card-header bg-white ">
          <div class="float-left font-weight-bold pt-2 pl-3">
            <p class="text-secondary">New Virtual Visit</p>
          </div>
        </div>
      `);

    cardHeader.append(buttonContainer);

    const cardBody = $(`
        <div class="card-body">
          <div class="row justify-content-center mt-2">
            <div class="col-4">
              <label for="visit[][date]" class="font-weight-bold">Date </label>
              <div class="input-group">
                <input type="date" class="form-control" name="visit[${index}][date]" value="date" required><br>
              </div>
            </div>
            <div class="col-4">
              <label for="visit[${index}][time]" class="font-weight-bold">Time</label>
              <div class="input-group">
                <input type="time" name="visit[${index}][time]"
                       class="form-control px-2 py-1" required>
                <div class="input-group-append">
                  <i class="input-group-text fas fa-clock"></i>
                </div>
              </div>
            </div>
            <div class="col-2"></div>
          </div>
          <div class="row justify-content-center">
            <div class="col-10">
              <div class="form-group mt-4">
                <label for="visit[${index}][notes]" class="font-weight-bold">Notes:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="visit[${index}][notes]"></textarea>
              </div>
            </div>
          </div>
        </div>
      `);

    const card = $(`
        <div class="card">
        </div>
       `);

    const container = $(`
        <div id="visit-${index}" class="col-10 mt-5"></div>
       `);

    card.append([cardHeader, cardBody]);
    container.append(card);

    $("#virtual-vists").append(container);
}

$("#addVisit").click(addVisit);
$(".removeVisit").click(removeVisit);
