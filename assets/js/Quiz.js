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
            this.note = null;
            this.btnVerifierActiver = false;
            this.btnValiderReponse = null;
            /*** État initial de l'app ***/
            // On commence par cacher le bouton de soumission du formulaire
            // Celui-ci ne servira QUE pour la version SANS JavaScript
            // this.btnValiderReponse.prop('enabled', false);
            this.objJSONQuiz = objJSON;
            $('.divBtnJs').append('<button id=\'validerReponse\' name=\'validerChoix\' tabindex="20">Valider ma réponse</button>');
            this.btnValiderReponse = $('#validerReponse');
            // $('#Q1').hide();
            $('#Q2').hide();
            $('#Q3').hide();
            $('#sectionResultat').hide();
            $('#validerQuiz').hide();
            this.afficherQuestion(this.questionActive);
            $(':radio').on('click', this.cliquerMonChoix.bind(this));
            this.btnValiderReponse.on('click', this.cliquerBtnValiderMonChoix.bind(this));
        }
        /**
         *
         * @param {number} no -> le numéro de la question à afficher
         */
        Quiz.prototype.afficherQuestion = function (no) {
            console.log(no);
            $('#noQuestion').html('Question ' + no + ' de 3 ');
            if (this.questionActive >= 2) {
                $('#pointage').html('Vous avez réussi ' + this.pointage + ' questions(s) sur 3!');
            }
            this.btnValiderReponse
                .html(this.objJSONQuiz['messages']['pasDeReponse'])
                .prop('disabled', true);
        };
        /**
         *
         * @param {event} evenement -> click
         */
        Quiz.prototype.cliquerMonChoix = function (evenement) {
            this.btnValiderReponse
                .html(this.objJSONQuiz['messages']['repondue'])
                .prop('disabled', false);
            this.btnValiderReponse
                .prop("class", "animated infinite pulse");
        };
        /**
         *t} evenement -> click
         * @param {event} evt} evenement -> click
        */
        Quiz.prototype.cliquerBtnValiderMonChoix = function (evenement) {
            var choixReponse = $('#Q' + this.questionActive)
                .find('li input:checked')
                .val();
            var reponse = Array('A', 'B', 'C', 'D');
            if ($('#Q' + this.questionActive).find('input:checked')) {
                if (choixReponse == this.objJSONQuiz['bonnesReponses']['R' + this.questionActive]) {
                    $('#contenuInteractifQ' + this.questionActive).append('' +
                        '<h3 id="reponse" class="animated bounceInRight">' +
                        this.objJSONQuiz['retroactions']['positive'] +
                        '</h3>' +
                        '<p class="explication animated bounceInRight">' +
                        this.objJSONQuiz['explications']['Q' + this.questionActive] +
                        '</p>');
                    this.pointage++;
                    this.btnVerifierActiver = true;
                }
                else {
                    $('#contenuInteractifQ' + this.questionActive).append('' +
                        '<h3 id="reponse" class="animated bounceInRight">' +
                        this.objJSONQuiz['retroactions']['negative'] +
                        '</h3>' +
                        '<p class="explication animated bounceInRight">' +
                        this.objJSONQuiz['explications']['Q' + this.questionActive] +
                        '</p>');
                    this.btnVerifierActiver = true;
                }
                $(':radio').prop('checked', false);
                for (var i = 0; i <= reponse.length; i++) {
                    var lesReponse = $('#Q' + this.questionActive)
                        .find($('#Q' + this.questionActive + reponse[i] + ' ~ label > div'));
                    var lesReponseVal = $('#Q' + this.questionActive + reponse[i]).val();
                    if (lesReponseVal == this.objJSONQuiz['bonnesReponses']['R' + this.questionActive]) {
                        lesReponse.prop('class', 'bonneReponse');
                    }
                    else {
                        lesReponse.prop('class', 'mauvaiseReponse');
                    }
                }
                if (this.btnVerifierActiver == true) {
                    this.btnValiderReponse
                        .html('Avancer à la prochaine question')
                        .on('click', this.cliquerBtnProchaineQuestion.bind(this));
                }
                $('.question' + this.questionActive + 'Radio')
                    .prop("disabled", true);
            }
        };
        Quiz.prototype.afficherResultat = function (num) {
            $('#pointage').hide();
            if (num == 1) {
                $('#sectionResultat').append('' +
                    '<h2 class="animated tada" tabindex="2">Voici votre résultat!</h2>' +
                    '<h3 class="animated tada" tabindex="3">Vous avez réussi \' + this.pointage +  \' sur 3 questions</h3>' +
                    '<div class="animated infinite tada" tabindex="4">' +
                    '<img class="img_table winner" ' +
                    '     src="assets/images/img_question/winner_w500.png" ' +
                    '     alt="Le poulet de la victoire!"> ' +
                    '<img class="img_mobile winner" ' +
                    '     src="assets/images/img_question/winner_w250.png" ' +
                    '     alt="Le poulet de la victoire!"> ' +
                    '</div>' +
                    '<p class="animated tada" tabindex="5">' + this.messageResultat + '</p>');
            }
            else {
                $('#sectionResultat').append('' +
                    '<h2 class="animated jackInTheBox" tabindex="2">Voici votre résultat!</h2>' +
                    '<h3 class="animated jackInTheBox" tabindex="3">Vous avez réussi ' + this.pointage + ' sur 3 questions!</h3>' +
                    '<p class="animated jackInTheBox" tabindex="4">' + this.messageResultat + '</p>');
            }
            this.btnValiderReponse
                .unbind()
                .on('click', this.recommencerQuiz.bind(this))
                .html('Recommencer le quiz!')
                .prop('disabled', false);
        };
        Quiz.prototype.recommencerQuiz = function () {
            document.location.href = "../../index.html";
        };
        /**
         *
         * @param {event} evenement -> click
         */
        Quiz.prototype.cliquerBtnProchaineQuestion = function () {
            this.btnValiderReponse
                .prop("class", "");
            if ($('#Q' + this.questionActive).find('li input:checked').val() == this.objJSONQuiz['bonnesReponses']['R' + this.questionActive]) {
                this.pointage++;
            }
            if (this.pointage != 0) {
                if (this.pointage == 1) {
                    this.note = 'Vous avez obtenu 33% a votre quiz!';
                    this.messageResultat = 'Vous n\'avez qu\'une seule bonne réponse. Meilleure chance la prochaine fois!';
                }
                if (this.pointage == 2) {
                    this.note = 'Vous avez obtenu 66% a votre quiz!';
                    this.messageResultat = 'Il ne manque qu\'une seule réponse à avoir pour avoir le score parfait! Tentez votre chance de nouveau!';
                }
                if (this.pointage == 3) {
                    this.note = 'Vous avez obtenu 100% a votre quiz!';
                    this.messageResultat = 'Vous connaissez parfaitement le jeu PlayerUnknown\'s Battleground. Félicitation!';
                }
            }
            else {
                this.note = 'Vous avez obtenu 0% a votre quiz!';
                this.messageResultat = 'Vous n\'avez aucune bonne réponse, tenter votre chance de nouveau pour réussir le quiz!';
            }
            $('#Q' + this.questionActive).hide();
            if (this.questionActive <= 3) {
                this.questionActive = this.questionActive + 1;
                this.afficherQuestion(this.questionActive);
                $('#Q' + this.questionActive).show();
                this.btnValiderReponse
                    .unbind()
                    .on('click', this.cliquerBtnValiderMonChoix.bind(this));
            }
            if (this.questionActive == 4) {
                this.btnValiderReponse
                    .prop("class", "animated infinite pulse");
                $('#sectionResultat').show();
                $('#noQuestion').hide();
                if (this.pointage == 3) {
                    this.afficherResultat(1);
                }
                else {
                    this.afficherResultat(0);
                }
            }
        };
        return Quiz;
    }());
    exports.Quiz = Quiz;
});
//# sourceMappingURL=Quiz.js.map