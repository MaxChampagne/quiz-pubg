import {Quiz} from "Quiz";

$('body').addClass('js');

fetch('assets/js/objJSONquiz.json')
    .then(data => data.json())
    .then((data) => {
        console.timeEnd('fetching data');
        const objQuiz = new Quiz(data);
    });
