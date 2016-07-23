/*
    Comment Block
*/
'use strict';

var nClass = function(par1, par2) {
    par2 = (par2 === undefined) ? null : par2;

    var vBool = true;
    var vInt = 1;
    var vFloat = 1.34;
    var vString1 = "str1";
    var vString2 = 'str2';
    var vArray = [0, 1, 2, 3, 4, 5, 6];
    var vDate = new Date();


    if(par1 == false) {
        console.log('a');
    }
    else {
        if(1 == 1 || (1 != 2 && 1 != 3)) {
            console.log('b');
        }
    }


    var nTag = document.createElement('a');
    nTag.setAttribute('href', 'http://sample.com');
    nTag.textContent = 'push';

    if(par1 == undefined) {
        window.open('http://www.anotherpage.com');
    }

    this.evoque(par1, par2);
    par2.evoqueAgain(par1);


    // JSON Object
    var json = {
        'name' : 'object name',
        'prop' : 'property value',
        aprop : 'another property value'
    };


    switch(json.aprop) {
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
    for(var it in json) {
        c++;
    }


    for(var i=0; i<vArray.length; i++) {
        c++;
    }


    return true;
};














/**/