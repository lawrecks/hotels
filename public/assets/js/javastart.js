//OBJECT LITERAL

/*var batwing = {
    status: "Ready",
    rescueBatman: function () {
        document.write("Locating his transponder...Inititaing launch");
    }
}
if (batwing.status === "Ready") {
    batwing.rescueBatman();
}

var utilities = {
    printAllMembers: function (targetObject) {
    for (i in targetObject) {
    document.write ("<br" + targetObject[i]);
}
}
}
utilities.printAllMembers(batwing); //It did not work, the problem is still unidentified */

/*var planet = {
    id: 13,
    name: "Quick Trial",
    faction: {
        factionId: 11,
        name: "trial",
        notification: function () {
            document.write ("It definitely has to work");
    }
    },
    cities: [
        {location: 12, name: "Gladius"},
        {location: 13, name: "connel"},
        {location: 14, name: "donna"}
    ] 
};
document.write (planet.cities[1].name);
planet.faction.notification();
document.write("<br> " + planet.name);
planet.name = "Lawrecks"; // Redefining the value of planet.name, 'Lawrecks' therefore replaces 'Quick Trial'
document.write("<br> " + planet.name);
var z = planet;
document.write(z.name); */

/*for (i in planet) {
    document.write("<br>" + i + " ==> " + planet[i]);
} */




// CONSTRUCTOR pattern

/*function car(make, model, year) {
    this.make = make;
    this.model = model;
    this.year = year;
}
var myCar = new car("toyota", "camry", 2016);
var myOtherCar = new car("nissan", "altima", 2017);
console.log(myCar);
document.write(myOtherCar.model); */




//  ARRAY OF OBJECTS

/*var users = [
    {
        name: 'John Doe',
        age: 30
    },
    {
        name: 'Mary Hompkins',
        age: 23
    },
    {
        name: 'Ejiogu Lawrecks',
        age: 22
    }
]

console.log(users[1]); */



//  EVENTS



// DOM - DOCUMENT OBJECT MODEL

/*window.onload = function() {
    var clickMeButton = document.getElementById('clickMe');
    clickMeButton.onclick = runTheExample;
} */

    /*function runTheExample() {
        alert('Running the example');
    } 
function runTheExample() {
    var myElement = document.getElementById('second');
    var myNodeName = myElement.nodeName;
    alert(myNodeName);
    if(myElement != null) {
        alert(myElement.innerHTML); */
    /*document.getElementById('second').innerHTML = "See how i changed the text";
    
    
    var paragraphsList = document.getElementsByTagName('p');  //DOM navigator
    alert(paragraphsList.length);
    var firstParagraph = paragraphsList[0];
    alert(firstParagraph.parentNode.nodeName);
    
    myElement.childnodes[0];
    myElement.firstChild;
    myElement.lastChild 
    
    myElement.nextSibling;
    myElement.previousSibling*/
    
   /* var myAnchor = document.getElementById('myAnchor');
    var anchorDestination = myAnchor.href;
    alert(anchorDestination);
    } */




// JQUERY    -    IS SIMPLY A LIBRARY THAT'S WRITTEN IN JAVASCRIPT AND MAKING IT EASIER TO WRITE
// JAVASCRIPT THAT WORKS ACROSS ALL POPULAR WEB BROWSERS, AS A RESULT AS BECOME THE MOST POPULAR
// LIBRARY TO  JAVASCRIPT DEVELOPERS. IT HAS FOUR MAIN CONCERNS;
/*
- DOM

- AJAX

- EVENTS

- EFFECTS */
 



//Tony Alicea TUTORIALS



//EXECUTION CONTEXT

/*function bD() {
    console.log(myVar);
}

function aD() {
    var myVar = 2;
    b();
}

var myVar = 1;
aD(); */       // if a variable is called inside an execution content and it isn't declared in the
// execution content, the program goes to the global execution context or its outer environment and searches for that variable.



//OBJECT LITERALS

/*function a() {
    var myVar = 2;
    function b() {
        console.log(myVar);
        }
    b();
}
var myVar = 1;
a(); */
/*var person = {
    firstname: "Joseph",
    lastname: "Theo"   
};
function greet(someone){
    console.log('Hi ' + someone.firstname);
};

greet(person);*/



//OBJECT LITERALS AND JSON

/*var trial = {
    firstname: "Mary",
    isAprogrammer: true
};
console.log(trial);
console.log(JSON.stringify(trial));
var jsonValue = JSON.parse(JSON.stringify(trial));
console.log(jsonValue); */

//Functions are special kinds of objects
/*function treat() {
    console.log('hi');
}
treat.language = 'english';
console.log(treat);
console.log(treat.language); */

//A function can be the invoked on lines that are above the its declaration line
/*greet(); //this works because the function is called in the global execution context
function greet() {
    console.log('hi');
} */

//Anonymous functions created inside variables can only be invoked on lines below
// the the variables declaration and not above
/*var anonymousFunction = function () {
    console.log('hello');
}
anonymousFunction(); */



// function statement
/*function greet(name) {
    console.log('Hello, ' + name);
}
greet();
// function expression
var greetFunc = function (name) {
    console.log('Hello, ' + name);
};
greet();

//An immediately invoked function expression (IIFE) is invoked immediately after
// it is created as the name implies. eg;

var greeting = function (name) {
    console.log('HELLO, ' + name);
    }('Lawrecks');
(function (name) {
    var greeting2 = 'Hello there, ';
    console.log(greeting2 + '' + name);
}) ('Lawrecks'); */ // Another way of writing IIFEs



//UNDERSTANDING CLOSURE

/*function greet (whattosay) {
    return function (name) {
        console.log(whattosay + ' ' + name + '!');
    }
}
greet('Hi')('Benji');

//or

var sayHi = greet('Hi');
sayHi('Benji');  */

/* function buildFunctions() {
    var arr = [];

    for (i = 0; i < 3; i++) {
      arr.push(function () {
          console.log(i);
      });
    }
    return arr;
}

var fs = buildFunctions();
fs[0] ();
fs[1] ();
fs[2] (); */
// instead of the expected result of 0, 1, 2, it outputs 3, 3, 3 because the value of i
// stored in the system memory is 3 and it was rejected by the for loop due to it wasn't included in the conditions
// stated. Then the buildFunctions() is slided off the execution stack although the value of i is still stored in the
// system memory. The function is then called again and this time around the value of i in the system memory is used.
// Therefore, its bad programming practice

// The right method is shown below;

/*function buildFunctions2() {
    var arr =[];
    
    for (i = 0; i < 3; i++) {
        let j = i;
        arr.push(function () {
            console.log(j)
        })
    }
    return arr;
}

var fs2 = buildFunctions2();
fs2[0] ();
fs2[1] ();
fs2[2] ();

//   OR

function buildFunctions3() {
    var arr = [];

    for (i = 0; i < 3; i++) {
        arr.push(
            (function (j) {
                return function () {
                    console.log(j);
                }
        }(i))
        );

    }
    return arr;
}

var fs3 = buildFunctions3();
fs3[0] ();
fs3[1] ();
fs3[2] (); */



//FUNCTION FACTORIES (functions that return or make things for you)

/*function makeGreeting(language) {
    return function (firstname, lastname) {
        if (language === 'en') {
            console.log('Hello '+ firstname + ' ' + lastname)
        }
        if (language === 'es') {
            console.log('Hola '+ firstname + ' ' + lastname)
        }
    }
}

let greetEnglish = makeGreeting('en');
let greetSpanish = makeGreeting('es');

greetEnglish('Ejiogu', 'Lawrence');
greetSpanish('Ejiogu', 'Lawrence');*/



//OUTPUTING RESULTS AFTER A SPECIFIC AMOUNT OF TIME



/*function sayHiLater() {
    let greet = 'Hi';
    setTimeout(function() {
        console.log(greet);
    }, 3000)
}
sayHiLater();

function trial() {
    let talk = 'hello';
    setTimeout(function() {
        console.log(talk)
    }, 8000);
}
trial();  */


// CALLBACK FUNCTIONS (ARE FUNCTIONS INSIDE OTHER FUNCTIONS AND EXECUTED AFTER THE PARENT FUNCTION IS EXECUTED)
/*function callMe(callback) {
    let a = 1000;
    let b = 2000;
    console.log(a + b);

    callback();
}
callMe(function() {
    console.log('I\'m done o');
}); */



//bind() can be used to create a copy of a function and parse in whatever object you want to be the 'this' variable
// when the function is executed;

/* let person = {
    firstname: 'John',
    lastname: 'Doe',
    getFullName: function() {
        let fullName = this.firstname + ' ' + this.lastname;
        return fullName;
    }
};

let logName = function (lang1, lang2) {
    console.log('Logged: ' + this.getFullName());
    console.log('Arguments: ' + lang1 + ' ' + lang2);
}.bind(person); //<--- this is executed directly or can be done as below

let logPerson = logName.bind(person);

logPerson('English', 'Spanish');

logName.call(person, 'English', 'Spania');  //call() is similar to bind but rather than just create a copy and parse
// it, it immediately executes the function

logName.apply(person,['English', 'es'[]); */    //apply() is similar to call, it just wants an array of parameters



//FUNCTIONAL PROGRAMMING

/*function mapForEach (arr, fn) {
    var newArr = [];
    for (i = 0; i < arr.length; i++) {
        newArr.push (fn(arr[i]));
    }
    return newArr;
}

let arr1 = [1,2,3];
let arr2 = mapForEach (arr1, function (item) {
    return item > 2;
});
console.log(arr2); */

/* var a = {};
var b = function () {

};
var c = [];

let john = {
    fname: 'Default',
    lname: 'Check',
    Song: 'Save me'
};

for (look in john) {
    console.log(look + ': ' + john[look]);
} */


// new - the new keyword can be used to build an object
/*function Person() {
    this.firstname = 'John',
    this.lastname = 'Doe'
}

let john = new Person(); //new created an empty object and Person() was passed into it as an object
console.log(john); //A function that is specifically used to construct an object is called a function constructor
*/
//Another example below
/*function Person(firstname, lastname) {
    console.log(this);
    this.firstname = firstname;
    this.lastname = lastname
}
let lawrence = new Person('Ejiogu', 'Lawrence');
console.log(lawrence);
let jane = new Person('Jane', 'Edith');
console.log(jane); */
//var i = $("ul.people li");
let splitWord = "Destruction is getting rampant this days";
console.log(splitWord.split(" "));

