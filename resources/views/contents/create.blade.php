@extends('layouts.dashboard',[
  'breadcrumbs' => [
    'Home' => '/',
    'HINTS' => '/contents',
    'New' => null
  ]
])

@section('content')

  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <title>Add new HINT</title>
  <br>

  <h2 class='sub-header'>Add new HINT</h2>

  <div class="card mt-5">
    <div class="card-body">
      <div class="m-2">
        <form action="/contents" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="content" class="font-weight-bold">Health Information Tip: </label>
                <textarea name="content" placeholder="Enter your hint here" class="form-control" cols="30" rows="10"
                          required></textarea><br>
              </div>
              <div class="form-group">
                <label for="category_id" class="font-weight-bold">Select category</label>
                <select class="form-control" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col">
              <label for="questions" class="font-weight-bold">Questions</label>
              <div class="accordion" id="accordion">
                @for ($i=0;$i<=1;$i++)
                  <div id="question_{{$i}}" class="card question border-bottom">
                    <div class="card-header" id="heading{{$i}}">
                      <h5 class="mb-0">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}"
                           aria-expanded={{$i==0}} aria-controls="collapse{{$i}}">
                          Question {{$i + 1}}
                        </a>
                        <button type="button" data-index="{{$i}}" class="remove-question btn btn-link float-right">
                          <i class="fas fa-times"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapse{{$i}}" class="collapse {{$i == 0 ? "show" : ""}}" data-parent="#accordion" border-bottom
                         aria-labelledby="heading{{$i}}">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="description">Question Text</label>
                          <textarea class="form-control" name="questions[{{$i}}][text]" v-model="question.description"
                                    rows="4" placeholder="Question text goes here..."></textarea>
                        </div>
                        <ul id="question_options_{{$i}}">
                          @for ($c = 0; $c < 3; $c++)
                            <li id="option_{{$c}}" class="option ">
                              <label for="questions[{{$i}}][options][{{$c}}][name]">Answer Choice {{$c + 1}}</label><br>

                              <input class="" name="questions[{{$i}}][options][{{$c}}][name]" type="text"
                                     id="questions[{{$i}}][options][{{$c}}][name]">
                              <span class="mx-1">
                                <input id="questions_{{$i}}" name="questions[{{$i}}][isAnswer]" type="radio"
                                       value="{{$c}}">
                                <label id="questions_{{$i}}" for="questions[{{$i}}][isAnswer]">Correct</label>
                              </span>
                              <button type="button" class="remove-option close" data-index="{{$i}}" data-optionindex="{{$c}}" aria-label="Close" data-toggle="tooltip"
                                      data-placement="right" title="Remove option">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </li>
                          @endfor
                        </ul>
                        <button type="button" data-index="{{$i}}" class="addOption btn btn-primary">Add choice</button>
                      </div>
                    </div>
                  </div>
                @endfor
              </div>
            </div>
          </div>
          <div class="float-right mt-5">
            <button type="button" class="btn btn-primary mx-3 addQuestion">
              <span>Add Question</span>
            </button>

            <input type="submit" class='btn btn-success btn'>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
{{-- <li id="option_{{$i}}" class="option">
  <div>
    <label for="questions[{{$i}}][options][{{$c}}][name]">Answer Choice {{$c + 1}}</label><br>

    <input class="" name="questions[{{$i}}][options][{{$c}}][name]" type="text" id="questions[{{$i}}][options][{{$c}}][name]">
    <span class="mx-1">
      <input id="questions_{{$i}}" name="questions[{{$i}}][isAnswer]" type="radio"  value="{{$c}}">
      <label id="questions_{{$i}}" for="questions[{{$i}}][isAnswer]">Correct</label>
    </span>

  </div>
</li> --}}
@push('scripts')
  <script type="text/javascript">
      $(function () {
          $('[data-toggle="tooltip"]').tooltip()
      })

      function optionElement(questionIndex, optionIndex) {
          var $liElement = $("<li>", {
              id: `option_${optionIndex}`,
              class: "option"
          })

          var $breakElement = $('<br>')
          var $spanElement = $("<span/>", {
              class: "mx-1 form-check form-check-inline"
          })

          var button = $('<button>', {
              type: 'button',
              class: 'remove-option close',
              'aria-label': 'Close',
              'data-toggle': 'tooltip',
              'data-placement': 'right',
              'data-index':questionIndex,
              'data-optionindex':optionIndex,
              'title': 'Remove option',
          }).append($('<span>&times;</span>', {
              'aria-hidden': true
          })).tooltip().click(removeOption)


          var $textlabel = $("<label/>", {
              text: `Answer Choice ${optionIndex + 1}`,
              for: "questions[" + questionIndex + "][options][" + optionIndex + "][name]",
          })

          var $textInput = $("<input/>", {
              type: "text",
              name: "questions[" + questionIndex + "][options][" + optionIndex + "][name]"
          })

          var $radioLabel = $("<label/>", {
              text: "Correct",
              class: "form-check-label",
              for: "questions[" + questionIndex + "][isAnswer]",
          })

          var $radioInput = $("<input/>", {
              type: "radio",
              name: "questions[" + questionIndex + "][isAnswer]",
              class: "form-check-input",
              value: optionIndex,
          })

          $spanElement.append($radioInput, $radioLabel);
          $liElement.prepend($textlabel, $breakElement, $textInput, $spanElement, button)

          return $liElement;
      }

      function question(index) {

          var headerWrapper = $('<div>', {
              id: `heading${index}`,
              class: 'card-header'
          });

          var header = $('<h5>', {
              class: 'mb-0',
          })

          var headerLink = $('<a>', {
              text: `Question ${index + 1}`,
              href: `#collapse${index}`,
              'aria-expanded': false,
              'aria-controls': `collapse${index}`,
              'data-toggle': 'collapse',
              'data-parent': '#accordion',
          })

          var headerButton = $('<button>', {
              type: 'button',
              class: 'remove-question btn btn-link float-right',
              'data-index':index
          }).append($('<i>', {
              class: 'fas fa-times'
          }))

          headerButton.click(removeQuestion)

          header.prepend(headerLink, headerButton)

          headerWrapper.prepend(header)


          var collapse = $('<div>', {
              id: `collapse${index}`,
              class: 'collapse',
              'data-parent': "#accordion",
              'aria-labelledby': `heading${index}`
          })

          var body = $('<div>', {
              class: 'card-body'
          })

          var formHeader = $('<div>', {
              class: 'form-group'
          }).append($('<label for="description"></label>'), $('<textarea>', {
              class: "form-control",
              name: `questions[${index}][text]`,
              rows: "4",
              placeholder: "Question text goes here..."
          }))

          var optionsContainer = $('<ul>', {
              id: `question_options_${index}`
          }).append(optionElement(index, 0))


          var addButton = $('<button>', {
              text: 'Add choice',
              type: "button",
              'data-index': index,
              class: "addOption btn btn-primary",
              onClick: addOption
          })

          body.append(formHeader, optionsContainer, addButton)

          addButton.click(addOption)


          collapse.append(body)


          return $('<div>', {
              id: `question_${index}`,
              class: 'card question'
          }).append(headerWrapper, collapse)


      }

      function addOption() {
          var index = $(this).data('index')
          var optionsContainer = $(`#question_options_${index}`);
          var optionIndex = optionsContainer.children('li').length
          console.log(optionIndex)
          optionsContainer.append(optionElement(index, optionIndex))

          console.log(optionIndex)
      }

      function addQuestion() {
          $('#accordion').append(question($('.question').length))
      }

      function removeQuestion() {
          var index = $(this).data('index')
          console.log(index)
          $(`#question_${index}`).remove()
      }

      function removeOption(){
          var questionIndex = $(this).data('index')
          var index = $(this).data('optionindex')

          $(`#question_options_${questionIndex} #option_${index}`).remove();
      }

      $('.addOption').click(addOption)
      $('.addQuestion').click(addQuestion)
      $('.remove-question').click(removeQuestion)
      $('.remove-option').click(removeOption)
  </script>
@endpush
