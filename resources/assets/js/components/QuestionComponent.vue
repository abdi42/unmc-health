

<template>

<div>
  <slot name="questions"></slot>
  <div class="accordion" id="accordion">
    <div class="card" v-for="(question,questionIndex) in questions">
      <div class="card-header" v-bind:id="'heading' + (questionIndex + 1)">
        <h5 class="mb-0">
          <a role="button" data-toggle="collapse" data-parent="#accordion" v-bind:href="'#collapse' + (questionIndex + 1)" v-bind:aria-expanded="(questionIndex  == 1)" v-bind:aria-controls="'collapse' + (questionIndex + 1)">
            Question 
          </a>
        </h5>
      </div>
      <div id="collapse{{$i}}" class="collapse {{$i == 1 ? "show" : ""}}" data-parent="#accordion" aria-labelledby="heading{{$i}}">
        <div class="card-body">
          <div class="form-group">
            <label for="description">Question Text</label>
            <textarea class="form-control" name="questions[{{$i}}][text]" v-model="question.description"  rows="4" placeholder="Question text goes here..."></textarea>
          </div>
          <ul>
            @for ($c = 0; $c < 4; $c++)
              <li>
                
                <label for="questions[{{$i}}][options][{{$c}}][name]">Answer Choice {{$i}}</label><br>
                <input class="" name="questions[{{$i}}][options][{{$c}}][name]" type="text" id="questions[{{$i}}][options][{{$c}}][name]">

                <input id="questions_{{$i}}" name="questions[{{$i}}][isAnswer]" type="radio"  value="{{$c}}">
                <label id="questions_{{$i}}">Correct</label>
                
              </li>
            @endfor
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

</template>

<script>

export default {
    props: {
        fquestions: {
            type: Array,
            default: function() {
                return [{
                    question_options: [{
                        isAnswer: null
                    }]
                }]
            }
        }
    },
    data: function() {
        return {
            questions: this.fquestions,
        }
    },
    methods: {
        addQuestion: function() {
            this.questions.push({
                question_options: [{
                    isAnswer: false
                }]
            })
        },
        removeQuestion: function(index) {
            this.questions.splice(index, 1);
        },
        addOption: function(index) {
            this.questions[index].question_options.push({
                isAnswer: false
            })
        },
        removeOption: function(questionIndex, index) {
            this.questions[questionIndex].question_options.splice(index, 1)
        }
    }
}

</script>
