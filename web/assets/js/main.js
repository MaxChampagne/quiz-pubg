define(["require", "exports", "Quiz"], function (require, exports, Quiz_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    $('body').addClass('js');
    fetch('assets/js/objJSONquiz.json')
        .then(function (data) { return data.json(); })
        .then(function (data) {
        console.timeEnd('fetching data');
        var objQuiz = new Quiz_1.Quiz(data);
    });
});
//# sourceMappingURL=main.js.map