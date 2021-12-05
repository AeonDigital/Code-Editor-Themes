// Line Block
'use strict';

const teste = "teste";

function teste() { return ''; };

/**
 * Comment Block
 *
 * @param string    par1    description of par1
 * @param string    par2    description of par2
 */
var nClass = function(par1, par2) {
    par2 = (par2 === undefined) ? null : par2;

    let vBool = true;
    var vInt = 1;
    var vFloat = 1.34;
    var vHex = 0x134;
    var vOctal = 0134;
    var vString1 = "str1" + "str2";
    var vString2 = 'str2';
    var vArray = [0, 1, 2, 3, 4, 5, 6];
    var vDate = new Date();

    var nTag = document.createElement('a');
    nTag.setAttribute('href', 'http://sample.com');
    nTag.textContent = 'push';

    this.evoque(par1, par2);

    // JSON Object
    var json = {
        'name' : 'object name',
        'prop' : 'property value',
        aprop : 'another property value'
    };


    switch (json.aprop) {
        case '0' :
            alert('here - 0');
            break;

        case '1' :
            alert('here - 1');
            break;

        default :
            alert('default');
            break;
    }


    var c = 0;
    for (var it in json) {
        c++;
    }

    if (1 === 2 && 33 === 4) {
    } else if (2 === 3) { }
    else {}


    for (var i=0; i<vArray.length; i++) {
        c++;
    }

    return true;
};



class Aluno {
    constructor(nome, curso, semestre) {
        this.nome = nome,
        this.curso = curso,
        this.semestre = semestre
    }
    get nomeAluno() {
        return this.nome
    }
    set nomeAluno(nomeAluno) {
        this.nome = nomeAluno
    }
}

let lucas = new Aluno('', 'Engenharia', 5)
lucas.nomeAluno = 'Lucas'
console.log(lucas.nome) //Lucas


/*
 Teste de comentário padrão
*/
