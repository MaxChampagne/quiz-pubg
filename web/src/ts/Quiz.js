/**
 * @author
 * @version
 * @todo
 */
define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var Quiz = /** @class */ (function () {
        function Quiz(objJSON) {
            this.questionActive = 1;
            this.nombreQuestions = 3;
            this.pointage = 0;
            this.btnVerifierActiver = false;
            /*** État initial de l'app ***/
            // On commence par cacher le bouton de soumission du formulaire
            // Celui-ci ne servira QUE pour la version SANS JavaScript
            // $('#validerReponse').prop('enabled', false);
            this.objJSONQuiz = objJSON;
            $('#Q2').hide();
            $('#Q3').hide();
            $('#validerQuiz').hide();
            this.afficherQuestion(this.questionActive);
            $(':radio').on('click', this.cliquerMonChoix.bind(this));
            $('#validerReponse').on('click', this.cliquerBtnValiderMonChoix.bind(this));
        }
        /**
         *
         * @param {number} no -> le numéro de la question à afficher
         */
        Quiz.prototype.afficherQuestion = function (no) {
            console.log(no);
            $('#noQuestion').html('Question ' + no + ' de 3 ');
            $('#validerReponse').html(this.objJSONQuiz['messages']['pasDeReponse']);
            $('#validerReponse').prop('disabled', true);
        };
        /**
         *
         * @param {event} evenement -> click
         */
        Quiz.prototype.cliquerMonChoix = function (evenement) {
            $('#validerReponse').html(this.objJSONQuiz['messages']['repondue']);
            $('#validerReponse').prop('disabled', false);
        };
        /**
         *t} evenement -> click
         * @param {event} evt} evenement -> click
    */
        Quiz.prototype.cliquerBtnValiderMonChoix = function (evenement) {
            $('.question' + this.questionActive + 'Radio').prop("disabled", true);
            var choixReponse = $('#Q' + this.questionActive).find('li input:checked').val();
            if ($('#Q' + this.questionActive).find('li input:checked')) {
                if (choixReponse == this.objJSONQuiz['bonnesReponses']['R' + this.questionActive]) {
                    $('#Q' + this.questionActive + 'Retroaction').html(this.objJSONQuiz['retroactions']['negative'] + '<br>' + this.objJSONQuiz['explications']['Q' + this.questionActive]);
                    this.pointage = this.pointage + 33;
                    this.btnVerifierActiver = true;
                }
                else {
                    $('#Q' + this.questionActive + 'Retroaction').html(this.objJSONQuiz['retroactions']['negative'] + '<br>' + this.objJSONQuiz['explications']['Q' + this.questionActive]);
                    this.btnVerifierActiver = true;
                }
                if (this.btnVerifierActiver == true) {
                    $('#validerReponse')
                        .html('Avancer à la prochaine question')
                        .on('click', this.cliquerBtnProchaineQuestion.bind(this));
                }
            }
        };
        /**
         *
         * @param {event} evenement -> click
         */
        Quiz.prototype.cliquerBtnProchaineQuestion = function () {
            $('#Q' + this.questionActive).hide();
            this.questionActive = this.questionActive + 1;
            console.log('prochain');
            this.afficherQuestion(this.questionActive);
            $('#Q' + this.questionActive).show();
            $('#validerReponse').unbind();
            $('#validerReponse').on('click', this.cliquerBtnValiderMonChoix.bind(this));
        };
        return Quiz;
    }());
    exports.Quiz = Quiz;
});
//# sourceMappingURL=Quiz.js.map