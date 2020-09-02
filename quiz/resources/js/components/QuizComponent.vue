<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Exam 
                        <!-- span tag will show index/question.lenth e.g. 1/7 -->
                        <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>



                    <div class="card-body">

                        <span class="float-right" style="color:red;">{{time}}</span>

                        <div v-for="(question,index) in questions" :key="index">
                            <div v-show="index===questionIndex">
                            {{question.question}}

                            <ol>

                            <!-- radio choice can only be selected once  -->
                            <li v-for="choice in question.answers" :key="choice">
                                <label>
                                    <input type="radio" 
                                        :value="choice.is_correct == true ? true :choice.answer"
                                        :name="index"
                                        v-model="userResponses[index]"
                                        @click="choices(question.id,choice.id)">

                                    {{choice.answer}}
                                </label>
                            </li>
                            </ol>
                        </div>
                        </div>

                        <!-- Next & Prev buttons -->
                        <div v-show="questionIndex != questions.length">
                            <button class="btn btn-success float-right" @click="next();postUserChoice()">Next</button>
                            <button class="btn btn-success" @click="prev()">Back</button>
                        </div>

                        <!-- Finish Button -->
                        <div v-show="questionIndex === questions.length">
                            <h2>
                                <center>
                                    You got: {{score()}}/{{questions.length}}
                                </center>
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        //Add quiz props from quiz.blade
        props: ['quizId', 'times', 'quizQuestions', 'hasQuizPlayed'],
        data(){
            return{
                questions:this.quizQuestions,
                questionIndex:0,
                userResponses:Array(this.quizQuestions.length).fill(false),
                currentQuestion:0,
                currentAnswer:0,
                clock:moment(this.times+60*1000)

            }
        },

        mounted() {
            setInterval(() => {
                this.clock = moment(this.clock.subtract(1, 'seconds'))
            },1000);
        },
        computed:{
            time(){
                var minsec = this.clock.format('mm:ss');
                if(minsec == '00:00'){
                    alert('Timeout!')
                    window.location.reload();
                }
                return minsec
            }
        },
        methods:{
            next(){
                this.questionIndex++
            },
            prev(){
                this.questionIndex--
            },
            choices(question,answer){
                this.currentAnswer = answer,
                this.currentQuestion = question
            },
            score(){
                return this.userResponses.filter((val)=>{
                    return val === true;
                }).length
            },
            postUserChoice(){
                axios.post('/quiz/create',{
                    answerId :this.currentAnswer,
                    questionId :this.currentQuestion,
                    quizId :this.quizId 

                }).then((response)=>{
                    console.log(response)
                }).catch((error)=>{
                    alert('Error!')
                });
            }
        }
    }
</script>
